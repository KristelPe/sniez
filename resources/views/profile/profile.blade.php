@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile/profile.css') }}" />

    <!-- PROFILEPAGE -->

    <div id="profile">

    <div id="profile_header">

    </div>

    <div id="profile_avatar">

        <img src="{{$user->avatar}}" alt="avatar">
        <h1>{{$user->name}}</h1>
        <a id="edit_profile" href="/edit">Bewerk profiel</a>
        
    </div>

        <div id="recipes_allergies">

            @foreach($user_allergies as $a)
                <div id="recipes_allergy">

                    <img src="images/cancel.png" alt="deleteBtn"> <p>{{$a->allergies->name}}</p>

                </div>

            @endforeach

                <a id="edit_allergies" href="/allergy">Bewerk allergieën</a>

        </div>

        <div id="profile_content">

            <div id="profile_content_mobile">

                <form id="qr" action="{{ action('QrController@getProduct') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label class=qrcode-text-btn>
                        <input class="input_file" name="qr" type=file accept="image/*" capture="camera" onchange="openQRCamera(this);" tabindex=-1>
                        <img src="/images/icons/menu/scan.png" alt="sniez">
                    </label>
                    <input id="data" name="data" type="text" hidden>
                </form>


                    <h1>Scan een barcode van een product</h1>
                    <p>Of open het menu om je recepten en producten te bekijken.</p>

            </div>



            <div id="profile_content_desktop">

                <div id="last_recipes">

                    <h2>Laatst opgeslagen recepten</h2>

                    <div id="last_recipes_block">

                        @foreach($recipes as $r)


                            <div class="recipes_recipe" id="recipes_recipe">

                                <a style="background-image: url('{{$r->img}}'); background-size: cover;" href="/recipe/{{$r->id}}">
                                    <p>{{$r->titel}}</p>
                                </a>

                            </div>


                        @endforeach

                        <a id="show_recipes" href="/recipes">Alle opgeslagen recepten ... </a>

                    </div>

                </div>

                <div id="last_products">

                    <h2>Laatst opgeslagen producten</h2>

                    <div id="last_recipes_block">

                        @foreach($products as $p)


                                <div class="recipes_recipe" id="recipes_recipe">

                                    <a style="background-image: url('{{$p->img}}'); background-size: cover;" href="/product/{{$p->id}}">
                                        <p>{{$p->titel}}</p>
                                    </a>

                                </div>


                        @endforeach

                        <a id="show_recipes" href="/products">Alle opgeslagen producten... </a>

                    </div>


                </div>


            </div>

        </div>


        </div>

        <!--<div id="profile_footer">

            <img src="images/logo/logo_ei.png" alt="logo">

        </div>-->

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

    </script>

@endsection