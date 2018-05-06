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
            align-content: center;

            margin: auto;
            margin-top: 20px;
            z-index: 10000;

            background-color: #A0D1E6;
            color: white;
            letter-spacing: 1px;
            font-weight: 100 ;
            border: none;

            padding: 10px 50px;
        }

        #recipes_all {

            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;

            width: 90%;
            margin-left: 5%;

            margin-top: 20px;


        }

        #recipes_recipe {

            margin-top: 20px;
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

            width: 240px;
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


    <div id="recipes">

        <div id="recipes_header">

        </div>

        <div id="recipes_avatar">

            <img src="{{$user->avatar}}" alt="{{"$user->name"}}">

        </div>

        <select id="recipes_dropDown">

            <option value="recipes_saved">Bewaarde recepten</option>
            <option value="recipes_all">Alle recepten</option>

        </select>

        <div id="recipes_allergies">

            @foreach($user_allergies as $allergy)

                <p>{{$allergy->name}}</p>

            @endforeach

        </div>

        <div id="recipes_saved" class="drop-down-show-hide">



        </div>

        <div id="recipes_all" class="drop-down-show-hide">


            @foreach($recipes as $r)

                <div id="recipes_recipe">

                    <a href="/recipe/{{$r->id}}">
                        <img src="{{$r->img}}" alt="recipe">
                        <p>{{$r->titel}}</p>
                    </a>

                </div>

                @endforeach

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