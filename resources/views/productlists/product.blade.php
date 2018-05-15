@extends('master')

@section('content')

    <style>

        #scanned_header {

            width: 100%;
            height: 12em;
            background-image: url("/images/backgrounds/bg_profile.jpg");
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;

            z-index: -2;
        }

        #scanned_avatar {

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #scanned_avatar img {

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

        #scanned_avatar h1 {

            text-align: center;
            font-size: 1em;
            letter-spacing: 1px;
        }

        #scanned_product {

            display: flex;
            flex-direction: column;
            justify-content: center;

            margin: auto;
            margin-top: 32px;

            width: 240px;
            height: auto;
            -webkit-box-shadow: 0 2px 4px darkgrey;
            -moz-box-shadow: 0 2px 4px darkgrey;
            box-shadow: 0 2px 4px darkgrey;

            padding-bottom: 32px;
        }

        #scanned_product img{

            margin-top: 20px;
        }

        #scanned_product p {

            text-align: center;
        }

        #product_save {

            align-self: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        #product_save p {

            font-size: 0.8em;
            margin-left: 10px;
            width: 50%;
            text-align: left;
            color: #88caab;
        }

        #product_save button {

            width: 40px;
            height: 40px;
            background-color: #88caab ;
            color: white;
            border-color: transparent;
            border-radius: 100px;
            margin-top: 10px;

        }


        #scanned_proposals {

            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;

            width: 90%;
            margin-left: 5%;

            margin-top: 20px;


        }

        #scanned_proposals h1 {

            font-size: 1em;
            font-weight: 200;
            margin-bottom: 24px;
        }

        #recipes_recipe a {

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
        }

        #recipes_recipe a img {

            width: 400px;
            height: auto;
            z-index: 0;
        }

        #recipes_recipe a p {

            position: absolute;
            color: black;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.95);
            font-size: 0.9em;

            width: 240px;
            margin-top: 100px;
            padding: 20px 5px;

        }


    </style>

    <div id="scanned">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div>
            <div id="scanned_header"></div>

            <div id="scanned_avatar">
                <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
            </div>

        </div>

        <div id="scanned_product">

            <div>
            <img src="{{$product->img}}" alt="scanned product">
            <p>{{$product->titel}}</p>
            </div>

            <div id="product_save">

                <button onclick="location.href='/product/'+ {{$product->id}} +'/addToList/1'">+</button>
                <p>Voeg toe aan één van je lijstjes.</p>

            </div>
        </div>

        <div id="scanned_proposals">

            <h1>Voorgestelde recepten:</h1>

            @foreach($all_recipes as $r)

                @if(($r->id)< 4)

                    <div id="recipes_recipe">

                        <a href="/recipe/{{$r->id}}">
                            <img src="{{$r->img}}" alt="recipe">
                            <p>{{$r->titel}}</p>
                        </a>

                    </div>

                @endif

            @endforeach


        </div>

    </div>


@endsection