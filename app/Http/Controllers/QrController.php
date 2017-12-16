<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use QrReader;

class QrController extends Controller
{
    public function index(){
        $file = Input::file('qr');
        $filename = $file->getClientOriginalName();
        $file->move('uploads/', $filename);

        $qrcode = new QrReader("../public/uploads/".$filename);
        $text = $qrcode->text();

        return redirect($text);
    }
}
