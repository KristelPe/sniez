<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\UserAllergy;

class ProductController extends Controller
{
    public function allProducts()
    {

        $user = User::find(1);
        $user_allergies = UserAllergy::all()->where('user_id', 1);

        // All Carrefour Products

        $all_products = Product::products();

        // Products that take the users allergies into account

        $products = $all_products;
        foreach ($all_products as $key => $a) {
            foreach ($user_allergies as $u){
                if (str_contains(strtolower($a->ingredienten), $u->allergies()->first()->name)) {
                    unset($products[$key]);
                }
            }
        }

        return view('productlists.products', compact('products', 'all_products', 'user', 'user_allergies'));
    }
}
