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
        background-color: transparent;
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

    #products_all {

        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;

        width: 90%;
        margin-left: 5%;

        margin-top: 20px;


    }

    .products_product {

        margin-top: 20px;
    }

    .products_product a {

        width: 240px;
        height: 240px;

        display: flex;
        flex-direction: column;
        justify-content: center;

        margin-bottom: 20px;

        overflow: hidden;

        border-radius: 4px;

        -webkit-box-shadow: 0 2px 4px darkgrey;
        -moz-box-shadow: 0 2px 4px darkgrey;
        box-shadow: 0 2px 4px darkgrey;
        background-size: 60%;
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }

    .products_product a p {

        position: absolute;
        color: black;
        z-index: 1;
        background-color: rgba(255, 255, 255, 0.95);
        font-size: 0.9em;

        width: 230px;
        margin-top: 85px;
        padding: 20px 5px;

        height: 30px;

    }

    #not_found{
        border-radius: 3px;
        border: 1px solid rgba(220, 20, 60, 0.3);
        padding: 1em;
        font-size: 12px;
        color: black;
        text-align: center;
        width: 160px;
        margin-left: auto;
        margin-right: auto;
    }

    #footer a {

        margin-top: 10px;

        margin-left: 10%;

        display: flex;
        flex-direction: row;
        text-decoration: none;

    }

    #footer a img {

        background-color: #A0D1E6 ;
        width: 15px;
        height: 15px;
        padding: 10px 10px;
        border-radius: 100%;

        -webkit-box-shadow: 0 2px 4px lightgrey;
        -moz-box-shadow: 0 2px 4px lightgrey;
        box-shadow: 0 2px 4px lightgrey;
    }

    #footer a p {


        font-size: 0.6em;
        margin-left: 10px;
        align-self: center;
        color:#A0D1E6;
    }


    @media screen and (min-width: 768px) {

        #products_all {

            justify-content: space-around;
        }

    }

    @media screen and (min-width: 1240px) {

        #products_all {

            width: 80%;
            margin-left: 10%;

        }

    }
</style>

<div class="scan">

    <div id="scan_header"></div>

    <div id="scan_avatar">
        <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
    </div>

    <form id="search" class="search" action="{{ action('QrController@searchProduct') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input id="input" name="search_val" class="input_search" type="text" placeholder="Zoek hier een product...">
        <button id="submit" type="button" class="btn_search">Zoek</button>
    </form>

    @if($search != "")
        <div class="mobile">
            <p>Resultaten voor:</p>
            <h1>{{ $search }}</h1>
        </div>
        <div id="products_all" class="drop-down-show-hide">
            @if($products != "")
                @foreach($products as $ap)
                    <div class="products_product">
                        <a style="background-image: url('{{$ap->img}}');" href="/product/{{$ap->id}}">
                            <p>{{$ap->titel}}</p>
                        </a>
                    </div>
                @endforeach
            @else
                <p id="not_found">Geen producten gevonden</p>
            @endif
        </div>
        <div id="footer">
            <a href="/scan"><img src="/images/nav/left-arrow.png" alt="back"><p>Ga terug</p></a>
        </div>
    @else
        <div class="mobile">
            <h1>Of scan een barcode</h1>
            <p>Klik op het icoontje om je camera te openen.</p>
        </div>

        <div class="desktop">
            <h1>Voor het scannen van een product heb je de mobiele versie van deze website nodig.</h1>
            <p>Zoek gerust je product via de zoekfunctie of gebruik je smartphone.</p>
        </div>

        <form id="qr" action="{{ action('QrController@getProduct') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label class=qrcode-text-btn>
                <input id="qrInput" class="input_file" name="qr" type=file accept="image/*" capture="camera" onchange="openQRCamera(this);" tabindex=-1>
                <img id="qrImg" src="/images/icons/menu/scan.png" alt="sniez">
            </label>
            <input id="data" name="data" type="text" hidden>
        </form>
    @endif
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

    $( document ).ready(function() { 
        var isMobile = false;  

        // device detection 
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { 
            isMobile = true; 
        }  

        if (isMobile == false) { 
            document.getElementById("qrInput").disabled = true; 
            document.getElementById("qrImg").style.cursor = "default";
        } 
    });

    $("#input").keypress(function(e) {
        if(e.which == 13) {
            if ($("#input").val() == ""){
                alert("Gelieve eerst een zoekwaarde in te vullen alvorens te zoeken");
                e.preventDefault();
            } else {
                $("#search").submit();
            }
        }
    });

    $("#submit").click(function(e) {
        if ($("#input").val() == ""){
            alert("Gelieve eerst een zoekwaarde in te vullen alvorens te zoeken");
            e.preventDefault();
        } else {
            $("#search").submit();
        }
    });
</script>


@endsection