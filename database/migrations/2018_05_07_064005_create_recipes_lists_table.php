<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });

        DB::table('recipes_lists')->insert(
            array(
                array('name' => 'Dipsausjes', 'img' => '/images/recipes_lists/hummus.jpg'),
                array('name' => 'Zoetigheden', 'img' => '/images/recipes_lists/sweets.jpg'),
                array('name' => 'Ontbijt', 'img' => '/images/recipes_lists/croque.jpeg'),
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
        Schema::dropIfExists('recipes_lists');
    }
}
