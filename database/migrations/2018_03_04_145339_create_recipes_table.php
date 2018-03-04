<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('ingredients');
            $table->string('preparation');
            $table->timestamps();
        });

        DB::table('recipes')->insert(
            array(
                array('title' => 'Pannenkoeken', 'ingredients' => 'Zelfrijzende bloem: 250 g ; Melk: 5 dl ; Eieren: 3 ; Vanillesuiker: zakje', 'preparation' => 'Zeef de bloem met de vanillesuiker. Maak in het midden een kuiltje, breek daarin de eieren. Roer alles door elkaar met een garde. Schenk er in een straaltje de helft van de melk bij. Bewerk tot een glad mengsel. Klop dan de rest van de melk door het beslag zodat het lichter wordt. Bak de pannenkoeken in een grote koekenpan, in hete boter of olie.'),

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
        Schema::dropIfExists('recipes');
    }
}
