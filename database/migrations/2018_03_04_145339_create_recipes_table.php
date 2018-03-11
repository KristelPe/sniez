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
                array('title' => 'Macaronie met ham en kaas', 'ingredients' => 'Macaroni: 300 g ; Gekookte ham (in blokjes): 200 g ; Bloem: 75 g ; Kaas (gemalen + 2 el kaas om af te werken): 200 g ; Boter (+ 1 el om mee af te werken): 75 g ; Melk: 1 l ; Nootmuskaat ; Peper ; Zout', 'preparation'=> 'Kook de macaroni beetgaar in gezouten water. Warm de oven voor op 175° C. Laat de boter smelten in een pannetje. Strooi er de bloem bij. Roer glad en laat kort opdrogen op het vuur. Giet nu beetje bij beetje de melk erbij. Blijf steeds roeren. Breng langzaam aan de kook en blijf roeren tot de saus glad en gebonden is. Laat ze 2 minuten zacht doorkoken. Strooi er, van het vuur af, de kaas bij. Roer tot de kaas volledig gesmolten is. Breng op smaak met nootmuskaat, peper en zout. Giet de macaroni af en vermeng ze meteen met de kaassaus. Voeg er de hamblokjes aan toe. Schep het mengsel in een ovenschaal. Bestrooi met kaas en beleg met vlokjes boter. Zet 15 minuten in een op 175° C voorverwarmde oven.' ),
                array('title' => 'Champignonroomsaus', 'ingredients' => 'Sjalotten: 2 ; Knoflook: 1 teentje ; Kalfsfond: 300 ml ; Room: 300 ml ; Champignons: 300 g ; Citroensap ; Boter ; Peper ; Zout'),

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
