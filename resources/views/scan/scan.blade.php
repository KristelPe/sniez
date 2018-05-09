@extends('master')
@section('content')

<style>

    #scan_header {

        width: 100%;
        height: 12em;
        background-image: url("images/backgrounds/bg_profile.jpg");
        background-size: cover;
        background-position: top;
        background-repeat: no-repeat;

        z-index: -2;
    }

    #scan_avatar {

        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    #scan_avatar img {

        width: 100px;
        height: 100px;
        border-radius: 100%;
        border: 5px solid white;

        align-self: center;
        margin-top: -50px;

        -webkit-box-shadow: 0 2px 4px lightgrey;
        -moz-box-shadow: 0 2px 4px lightgrey;
        box-shadow: 0 2px 4px lightgrey;

    }

    .search{
        margin-top: 50px;
        width: 200px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .input_search{
        border-radius: 3px;
        border: 1px solid #F4BF73;
        padding: 1em;
        width: 170px;
    }
    
    .btn_search{
        background-image: url(/images/icons/search-orange.svg);   
        background-repeat: no-repeat;
        background-size: 100%;
        border: 0;
        text-indent: -9999px;
        margin-left: -3em;
    }
    
    .mobile{   
        max-width: 70%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 3em;
        margin-bottom: 3em;
    }
     
    .desktop{
        display: none;   
    }
    
    .scan h1, p{
        text-align: center;   
    }
        
    .input_file{
        display: none;   
    }
    
    #qr img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        cursor: pointer;   
        border-radius: 100%;
        border: 1px solid #F4BF73;
    }
    
    @media screen and (min-width: 1024px){
        .search{
            width: 330px;
        }
        
        .input_search{
            width: 300px;
        }
        
        .mobile{
            display: none;   
        }
     
        .desktop{
            display: block;   
            max-width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 3em;
            margin-bottom: 5em;
        }
    }
</style>

<div class="scan">

    <div id="scan_header">

    </div>

    <div id="scan_avatar">

        <img src="{{$user->avatar}}" alt="{{"$user->name"}}">

    </div>

    <div class="search">
        <input class="input_search" type="text" placeholder="Zoek hier een product...">
        <button class="btn_search">Zoek</button>
    </div>

    <div class="mobile">
        <h1>Of scan een barcode</h1>
        <p>Klik op het icoontje om je camera te openen.</p>
    </div>
    
    <div class="desktop">
        <h1>Voor het scannen van een product heb je de mobiele versie van deze website nodig.</h1>
        <p>Zoek gerust je product via de zoekfunctie of gebruik je smartphone.</p>
    </div>

    <form id="qr" action="{{ action('QrController@test') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label class=qrcode-text-btn>
            <input class="input_file" name="qr" type=file accept="image/*" capture="camera" onchange="openQRCamera(this);" tabindex=-1>
            <img src="/images/icons/menu/scan.png" alt="sniez">
        </label>
        <input id="data" name="data" type="text" hidden>
    </form>
</div>

<script src='https://dmla.github.io/jsqrcode/src/qr_packed.js'></script>
<script>
    function openQRCamera(node) {
        var reader = new FileReader();
        reader.onload = function() {
            node.value = "";
            qrcode.callback = function(res) {
                if(res instanceof Error) {
                    alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
                } else {
                    //node.parentNode.previousElementSibling.value = res;
                    //window.location.href = res;
                    //alert(res);
                    document.getElementById('data').value = res;
                    document.getElementById("qr").submit();
                }
            };
            qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);

    }

@endsection