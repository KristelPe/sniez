<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['product', 'recipe']);
            $table->string('name');
            $table->string('img');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        DB::table('lists')->insert(
            array(
                array('name' => 'Dipsausjes', 'type' => 'recipe', 'img' => '/images/recipes_lists/hummus.jpg'),
                array('name' => 'Zoetigheden', 'type' => 'recipe', 'img' => '/images/recipes_lists/sweets.jpg'),
                array('name' => 'Ontbijt', 'type' => 'recipe', 'img' => '/images/recipes_lists/croque.jpeg'),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
}
