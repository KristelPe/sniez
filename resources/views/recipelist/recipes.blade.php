@extends('master')

@section('content')

    <style>


        #recipes_header {

            width: 100%;
            height: 12em;
            background-image: url("images/backgrounds/bg_recipes.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            z-index: -2;
        }

        #recipes_avatar {

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #recipes_avatar img {

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

        #recipes_avatar h1 {

            text-align: center;
            font-size: 1em;
            letter-spacing: 1px;
        }

        #recipes_dropDown {

            display: flex;
            flex-direction: column;
            justify-content: center;

            margin: auto;
            margin-top: 10px;
            z-index: 10000;
        }

        #recipes_dropDown option {

            width: 280px;
        }

        #recipes_all {

            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;

            width: 90%;
            margin-left: 5%;


        }

        #recipes_all h2 {

            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 0.8em;
            letter-spacing: 1px;
        }

        #recipes_recipe a {

            width: 150px;
            height: 150px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            margin-bottom: 20px;

            overflow: hidden;

            border-radius: 4px;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #recipes_recipe a img {

            width: auto;
            z-index: 0;
        }

        #recipes_recipe p {

            position: absolute;
            color: #A0D1E6;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.95);
            font-size: 0.8em;

            width: 150px;
            margin-top: 110px;
            padding: 20px 5px;

        }



    </style>


    <div id="recipes">

        <div id="recipes_header">

        </div>

        <div id="recipes_avatar">

            <img src="{{$user->avatar}}" alt="avatar">
            <h1>{{$user->name}}</h1>

        </div>

        <select id="recipes_dropDown">

            <option value="recipes_saved">Bewaarde recepten</option>
            <option value="recipes_all">Alle recepten</option>

        </select>

        <div id="recipes_allergies">

            @foreach($allergy as $a)

                <p>{{$a->name}}</p>

            @endforeach

        </div>

        <div id="recipes_saved" class="drop-down-show-hide">

            Mijn bewaarde recepten

        </div>

        <div id="recipes_all" class="drop-down-show-hide">

            <h2>Alle recepten van Libelle Lekker</h2>

            <div id="recipes_recipe">
                <a href="/recipe">
                <img src="images/recipe/bg_recipe.jpg" alt="recipe">
                <p>{{$recipe->title}}</p>
                </a>

            </div>

            <div id="recipes_recipe">

                <a href="/recipe">
                <img src="images/recipe/bg_recipe.jpg" alt="recipe">
                <p>{{$recipe->title}}</p>
                </a>

            </div>

            <div id="recipes_recipe">
                <a href="/recipe">
                <img src="images/recipe/bg_recipe.jpg" alt="recipe">
                <p>{{$recipe->title}}</p>
                </a>

            </div>

        </div>

    </div>

    <script>

        $('#recipes_saved').show();
        $('#recipes_all').hide();

        $('#recipes_dropDown').change(function () {
            $('.drop-down-show-hide').hide();
            $('#' + this.value).show();

        });
    </script>



@endsection