<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $user = User::find(1);

        return view('scan.scan', compact('user'));
    }

    public function test(Request $request){
        $item = json_decode($request->input('data'));
        //dd($item);
        return view('scan.product', compact('item'));
    }
}
