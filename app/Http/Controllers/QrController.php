<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use QrReader;

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
        return view('scan.scan');
    }

    public function test(Request $request){
        $item = json_decode($request->input('data'));
        //dd($item);
        return view('scan.product', compact('item'));
    }
}
