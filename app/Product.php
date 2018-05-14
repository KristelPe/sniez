<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function products(){

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/sniezproducts/sniezproducts");
        $products = json_decode($json_string);

        return $products;

    }

    public static function product($id) {

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/sniezproducts/sniezproducts/$id");
        $product = json_decode($json_string);

        return $product;

    }
}
