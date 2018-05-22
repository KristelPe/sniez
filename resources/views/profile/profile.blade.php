@extends('master')

@section('content')

    <style>

        #profile_header {

            width: 100%;
            height: 8em;
            background-image: url("images/backgrounds/bg_profile.jpg");
            background-size: cover;
            background-repeat: no-repeat;

            z-index: -2;
        }

        #profile_avatar {

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #profile_avatar img {

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

        #profile_avatar h1 {

            text-align: center;
            font-size: 1em;
            letter-spacing: 1px;
        }

        #recipes_allergies {

            display: flex;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;

            margin-left: -5%;

            margin-top: 10px;
        }

        #recipes_allergy {

            display: flex;
            flex-direction: row;

            background-color: #A0D1E6;
            color:white;
            font-size: 0.8em;
            font-weight: 100;
            margin-left: 20px;
            margin-top: 10px;
            padding: 0px 20px;

            border-radius: 4px;

        }

        #recipes_allergy img {

            width: 10px;
            height: 10px;
            margin-top: 15px;
            margin-right: 10px;
        }
        
        #edit_profile {

            font-size: 0.6em;
            color: #A0D1E6;
            text-align: center;

            align-self: center;
            margin-top: 10px;

            border-bottom: 1px solid #A0D1E6;

        }

        #edit_allergies {

            font-size: 0.6em;
            color: #A0D1E6;

            align-self: center;
            margin-left: 20px;
            margin-top: 10px;

            border-bottom: 1px solid #A0D1E6;

        }
        
        .recipes_recipe {

            margin-top: 20px;
            margin-left: 0.7em;
        }

        .recipes_recipe a {

            width: 240px;
            height: 240px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            margin-bottom: 20px;

            overflow: hidden;

            border-radius: 4px;

            -webkit-box-shadow: 0 2x 4px darkgrey;
            -moz-box-shadow: 0 2px 4px darkgrey;
            box-shadow: 0 2px 4px darkgrey;

            background-size: cover;
        }

        .recipes_recipe a p {

            border-radius: 0 0 3px 3px;
            position: absolute;
            color: black;
            background-color: rgba(255, 255, 255, 0.95);
            font-size: 0.9em;

            width: 230px;
            margin-top: 85px;
            padding: 20px 5px;

            height: 30px;
        }

        .scan h1, p{
            text-align: center;
        }

        .input_file{
            display: none;
        }

        #qr img{
            display: block;
            width: 120px;
            height: 120px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            cursor: pointer;
            border-radius: 100%;
            border: 1px solid #F4BF73;
        }

        #profile_content {

            display: flex;
            flex-direction: column;

            width: 80%;
            margin-left: 10%;

            margin-top: 20px;
        }

        #profile_content_mobile h1 {

            font-size: 1em;
            font-weight: 400;
            text-align: center;
            margin-top: 20px;
        }

        #profile_content_mobile p {

            font-size: 0.8em;
            font-weight: 100;
            text-align: center;
            line-height: 1.8em;
        }

        #profile_content_desktop {

            display: none;
        }

        @media screen and (min-width: 1100px) {

            #profile_content_mobile {

                display: none;
            }

            #profile_content_desktop {

                display: flex;
                flex-direction: column;
            }

            #profile_content_desktop h2 {

                font-weight: 100;
            }

            #last_recipes {

                display: flex;
                flex-direction: column;
                justify-content: flex-start;
            }

            #last_recipes_block {

                display: flex;
                flex-direction: row;
                flex-wrap: wrap;

                width: 100%;

                margin-left: -20px;

            }

            #show_recipes {

                width: 240px;
                height: 240px;
                margin-top: 20px;
                background-color: #A0D1E6 ;
                color: white;
                font-weight: 100;
                font-size: 0.8em;
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;

                border-radius: 4px;

                -webkit-box-shadow: 0 2px 4px lightgrey;
                -moz-box-shadow: 0 2px 4px lightgrey;
                box-shadow: 0 2px 4px lightgrey;

                margin-left: 0.7em;

            }

            #last_products {

                margin-top: 30px;
            }


        }

    </style>

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

                            @if(($r->id)< 4)

                            <div class="recipes_recipe" id="recipes_recipe">

                                <a style="background-image: url('{{$r->img}}'); background-size: cover;" href="/recipe/{{$r->id}}">
                                    <p>{{$r->titel}}</p>
                                </a>

                            </div>

                            @endif

                        @endforeach

                        <a id="show_recipes" href="/recipes">Alle opgeslagen recepten ... </a>

                    </div>

                </div>

                <div id="last_products">

                    <h2>Laatst opgeslagen producten</h2>

                    <div id="last_recipes_block">

                        @foreach($products as $p)

                            @if(($p->id)< 4)

                                <div class="recipes_recipe" id="recipes_recipe">

                                    <a style="background-image: url('{{$p->img}}'); background-size: cover;" href="/product/{{$p->id}}">
                                        <p>{{$p->titel}}</p>
                                    </a>

                                </div>

                            @endif

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