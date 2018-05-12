<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe
{
    public static function recipes(){

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/testsniezapi/snieztest");
        $recipes = json_decode($json_string);

        return $recipes;

    }

    public static function recipe($id) {

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/testsniezapi/snieztest/$id");
        $recipe = json_decode($json_string);

        return $recipe;

    }
}
