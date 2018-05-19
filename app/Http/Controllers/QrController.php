<?php

namespace App\Http\Controllers;

use App\Lists;
use App\Product;
use App\Recipe;
use App\UserAllergy;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use QrReader;
use App\User;

class QrController extends Controller
{
    public function index(){
        /*$file = Input::file('qr');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/', $filename);
        $image = imagecreatefromjpeg("../public/uploads/".$filename);
        unlink("../public/uploads/".$filename);
        imagejpeg($image, "../public/uploads/".$filename , 10);

        $qrcode = new QrReader("../public/uploads/".$filename);

        //$qrcode = new QrReader("../public/uploads/test.jpg");
        $text = $qrcode->text();

        return $text;
        //return redirect($text);
        */
        $user = Auth::user();
        $product = $search = "";

        return view('scan.scan', compact('user', 'product', 'search'));
    }

    public function getProduct(Request $request){
        $id = $request->input('data');

        $user = Auth::user();
        $product = Product::product($id);
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        $alerts = array();
        foreach ($user_allergies as $u){
            if (str_contains($product->alerts, $u->allergies()->first()->name)) {
                array_push($alerts, $u->allergies()->first()->name);
            }
        }

        $recipes = Recipe::recipes();
        $all_recipes = $recipes;
        foreach ($all_recipes as $key => $a) {
            foreach ($user_allergies as $u) {
                if (str_contains(strtolower($a->alerts), $u->allergies()->first()->name)) {
                    unset($all_recipes[$key]);
                }
            }
        }
        $keys = array_keys($all_recipes);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $all_recipes[$key];
        }
        $all_recipes = array_slice($random, 0, 5);

        // Saved Products

        $products_lists = Lists::where('type', 'product')->get()->sortByDesc('id');

        return view('productlists.product', compact('product', 'all_recipes', 'user', 'products_lists', 'alerts'));

    }

    public function searchProduct(Request $request)
    {
        $user = Auth::user();

        $search = $request->search_val;

        $all_products = Product::products();
        $products = array();
        foreach ($all_products as $key => $a) {
            if (str_contains(strtolower($a->titel), strtolower($search))) {
                array_push($products, $a);
            }
        }
        return view('scan.scan', compact('user', 'products', 'search'));
    }
}
