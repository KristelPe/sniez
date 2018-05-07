@extends('master')

@section('content')

    <style>

        #recipe_header {

            width: 100%;
            height: 12em;
            background-image: url("{{$recipe->img}}");
            background-size: cover;
            background-repeat: no-repeat;

            z-index: -2;
        }

        #recipe_head {

            display: flex;
            flex-direction: column;
            align-self: center;

            width: 300px;
            height: 120px;
            margin: auto;

            background-color: white;
            margin-top: -60px;
            border-radius: 6px;

            -webkit-box-shadow: 0 2px 15px lightgrey;
            -moz-box-shadow: 0 2px 15px lightgrey;
            box-shadow: 0 2px 15px lightgrey;


        }

        #recipe_save {

            align-self: center;
            display: flex;
            flex-direction: row;
        }

        #recipe_save p {

            font-size: 0.5em;
            margin-left: 10px;
        }

        #recipe_save button {

            background-color: #F4BF73 ;
            color: white;
            border-color: transparent;
            border-radius: 100%;
        }

        #recipe_title {

            margin-top: 8px;
        }

        #recipe_title h1 {

            color: black;
            font-weight: 600;
            font-size: 1.2em;
            text-align: center;
        }

        #recipe_title p {

            color: darkgrey;
            margin-top: -10px;
            font-weight: 100;
            font-size: 0.8em;
            text-align: center;

        }

        #recipe_avatar {

            margin-top: -30px;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            margin-right: 5px;
        }

        #recipe_avatar img {

            width: 50px;
            height: 50px;
            border-radius: 100%;
            border: 4px solid #A0D1E6;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #recipe_content {

            width: 80%;
            height: 300px;
            overflow: scroll;
            margin-left: 10%;
            margin-top: -10px;
        }

        .recipe_content_title {

            color: black;
            font-size: 1em;
            font-weight: 600;
            padding: 5px 0px;
        }

        #recipe_content p {

            color: darkgrey;
            font-weight: 100;
            font-size: 0.8em;
            line-height: 20px;
        }

        #recipe_footer {

            width: 80%;
            margin-left: 10%;
            margin-top: 20px;

            display: flex;
            flex-direction: row;

        }

        #recipe_footer a img {

            background-color: #A0D1E6 ;
            width: 15px;
            padding: 10px 10px;
            border-radius: 100%;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #recipe_footer p {

            font-size: 0.6em;
            margin-left: 10px;
            align-self: center;
            color:#A0D1E6;
        }




    </style>

    <div id="recipe">

        <div id="recipe_header">

        </div>



        <div id="recipe_head">

            <div id="recipe_title">

                <h1>{{$recipe->titel}}</h1>
                <p>Geschikt voor {{$recipe->personen}} personen</p>

            </div>

            <div id="recipe_save">

                <button>+</button>
                <p>Voeg toe aan één van je lijstjes.</p>

            </div>

        </div>

        <div id="recipe_avatar">

            <img src="{{$user->avatar}}" alt="{{"$user->name"}}">

        </div>

        <div id="recipe_content">

            <div id="recipe_ingredients">

                <h2 class="recipe_content_title">Ingrediënten</h2>

                <p>{{$recipe->ingredienten}}</p>

            </div>

            <div id="recipe_preparation">

                <h2 class="recipe_content_title">Werkwijze</h2>

                <p>{{$recipe->bereiding}}</p>

            </div>

        </div>

        <div id="recipe_footer">

            <a href="/recipes"><img src="images/nav/left-arrow.png" alt="back"></a>
            <p>Ga terug</p>

        </div>




    </div>

@endsection