<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
        });

        DB::table('allergies')->insert(
            array(
                array('name' => 'eieren', 'path' => '/images/icons/eieren.png'),
                array('name' => 'gluten', 'path' => '/images/icons/gluten.png'),
                array('name' => 'honing', 'path' => '/images/icons/honing.png'),
                array('name' => 'lupine', 'path' => '/images/icons/lupine.png'),
                array('name' => 'melk', 'path' => '/images/icons/melk.png'),
                array('name' => 'noten', 'path' => '/images/icons/lupine.png'),
                array('name' => 'pinda', 'path' => '/images/icons/pinda.png'),
                array('name' => 'schaaldieren', 'path' => '/images/icons/schaaldieren.png'),
                array('name' => 'selderij', 'path' => '/images/icons/selderij.png'),
                array('name' => 'sesamzaad', 'path' => '/images/icons/sesamzaad.png'),
                array('name' => 'soja', 'path' => '/images/icons/soja.png'),
                array('name' => 'sulfieten', 'path' => '/images/icons/sulfieten.png'),
                array('name' => 'vis', 'path' => '/images/icons/vis.png'),
                array('name' => 'weekdieren', 'path' => '/images/icons/weekdieren.png')
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
        Schema::dropIfExists('allergies');
    }
}
