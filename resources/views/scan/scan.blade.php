@extends('master')
@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/scan/scan.css') }}" />

    <!-- SCANPAGE -->

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
        <div id="mobile" class="mobile">
            <h1>Of scan een barcode</h1>
            <p>Klik op het icoontje om je camera te openen.</p>
        </div>

        <div id="desktop" class="desktop">
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


    <!-- JS -->

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
            document.getElementById("mobile").style.display = "none";
            document.getElementById("desktop").style.display = "block";
        }  else {
            document.getElementById("mobile").style.display = "block";
            document.getElementById("desktop").style.display = "none";
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