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
            font-size: 0.8em;
            font-weight: 400 ;
            border: none;
            border-radius: 0%;

            padding: 10px 50px;
        }

        #recipes_allergies {

            display: flex;
            flex-direction: row;
            flex-wrap: wrap;

            margin-top: 10px;
        }

        #recipes_allergy {

            display: flex;
            flex-direction: row;

            background-color: #f3be7d;
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



        #recipes_saved {

            display: flex;
            flex-direction: column;
            justify-content: center;

            width: 90%;
            margin-left: 5%;

            margin-top: 20px;
        }

        #add_recipes_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

            width: 90%;
            margin-left: 5%;
        }

        #add_recipes_list a {

            display: flex;
            flex-direction: row;
            background-color: #A0D1E6 ;

            width: 280px;
            height: 112px;

            margin-bottom: 20px;

            overflow: hidden;

            border-radius: 4px;
            text-decoration: none;

            -webkit-box-shadow: 0 2px 4px darkgrey;
            -moz-box-shadow: 0 2px 4px darkgrey;
            box-shadow: 0 2px 4px darkgrey;

        }

        #add_recipes_list a img {

            width: 40px;
            height: 40px;

            margin-left: 50px;
            margin-right: 50px;

            align-self: center;

        }

        #add_recipes_list a #text_add {
            display: flex;
            flex-direction: column;
            justify-content: center;

            background-color: white;
        }

        #add_recipes_list a p {

            margin-left: 20px;
            color: #3f3f3f;
            font-weight: 400;
            align-self: center;
            font-size: 0.8em;
        }

        #add_list_form {

            margin-top: -20px;
            margin-bottom: 50px;

            display: none;
        }

        #add_list_form form {

            display: flex;
            flex-direction: column;
            justify-content: center;

            margin: auto;

            background-color: #A0D1E6 ;
            width: 280px;
            height: 280px;
        }

        #add_list_form h2 {

            color: white;
            font-weight: 400;
            font-size: 1em;
            text-align: center;
        }


        #add_list_form form input {

            width: 90%;
            margin-left: 3.5%;
            height: 40px;
            margin-top: 20px;
        }

        #add_list_form form input::-webkit-input-placeholder {

            padding-left: 10px;
            opacity: 0.5;

        }
        
        #add_list_form form button {
            
            color: white;
            padding: 10px;
            width: 50%;
            margin-left: 25%;
            margin-top: 20px;
            background-color: #f3be7d;

        }



        #recipes_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

            width: 90%;
            margin-left: 5%;

        }

        #recipes_list a {

            display: flex;
            flex-direction: row;

            width: 280px;
            height: 112px;

            margin-bottom: 20px;

            overflow: hidden;

            border-radius: 4px;

            -webkit-box-shadow: 0 2px 4px darkgrey;
            -moz-box-shadow: 0 2px 4px darkgrey;
            box-shadow: 0 2px 4px darkgrey;

            text-decoration: none;

        }

        #recipes_list a #img_list {

            width: 140px;
            height: 112px;
        }

        #recipes_list a #img_list img {

            width: 180px;
            margin-top: -8px;
            height: auto;
            z-index: 0;
        }



        #recipes_list a #info_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

            background-color: white;
        }

        #recipes_list a #info_list p {

            margin-left: 20px;
            color: #3f3f3f;
            font-weight: 400;
            align-self: center;
        }

        #recipes_list a #info_list span {

            font-size: 0.6em;
            margin-top: -20px;
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

        @media screen and (min-width: 768px) {

            #recipes_allergies {

                display: flex;
                flex-direction: row;

                justify-content: center;

                margin-top: 10px;
            }

            
            #recipes_saved {

                display: flex;
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
                width: 90%;
                margin-left: 5%;

                margin-top: 20px;
            }

            #add_recipes_list {

                display: flex;
                flex-direction: row;
                justify-content: center;

                width: 90%;
                margin-left: 5%;
            }

            #recipes_list {

                display: flex;
                flex-direction: row;

                width: 400px;
                height: 240px;

                margin-bottom: 20px;

                overflow: hidden;

                border-radius: 4px;

                -webkit-box-shadow: 0 2px 4px darkgrey;
                -moz-box-shadow: 0 2px 4px darkgrey;
                box-shadow: 0 2px 4px darkgrey;

                text-decoration: none;

            }

            #recipes_list a {

                display: flex;
                flex-direction: row;

                width: 400px;
                height: 240px;

                margin-bottom: 20px;

                overflow: hidden;

                border-radius: 4px;

                -webkit-box-shadow: 0 2px 4px darkgrey;
                -moz-box-shadow: 0 2px 4px darkgrey;
                box-shadow: 0 2px 4px darkgrey;

                text-decoration: none;
            }


            #recipes_list a #img_list {

                width: 240px;
                height: 240px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
            }

            #recipes_list a #img_list img {

                width: 240px;
            }










        }



    </style>


    <div id="recipes">

        <div>

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

            @foreach($user_allergies as $a)
                <div id="recipes_allergy">

                <img src="images/cancel.png" alt="deleteBtn"> <p>{{$a->allergies->name}}</p>
                </div>

            @endforeach

            </div>

        </div>

        <div id="recipes_saved" class="drop-down-show-hide">


            <div id="add_recipes_list">

                <a href="#">

                    <img src="images/add.png" alt="add_list">
                    <div id="text_add">
                    <p>Voeg een nieuw bord toe</p>
                    </div>

                </a>

            </div>

           <div id="add_list_form">

                <form action="" method="POST">

                    {{ csrf_field() }}

                    <input name="name_list" placeholder="De naam van je lijstje" type="text">
                    <input name="img_list" placeholder="Link van de foto" type="text">

                    <button type="submit">Verzenden</button>


                </form>


            </div>


            @foreach($recipe_lists as $list)

                <div id="recipes_list">

                    <a href="/list/{{$list->id}}">

                        <div id="img_list"><img src="{{$list->img}}" alt="header_List"></div>
                        <div id="info_list">
                        <p>{{$list->name}}</p>
                        <span><p style="color: #a3a3a3;">X recepten</p></span>
                        </div>

                    </a>

                </div>


            @endforeach


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

        // POPUP FORM

        function deselect(e) {
            $('#add_list_form ').slideFadeToggle(function() {
                e.removeClass('selected');
            });
        }

        $(function() {
            $('#add_recipes_list').on('click', function() {
                if($(this).hasClass('selected')) {
                    deselect($(this));
                } else {
                    $(this).addClass('selected');
                    $('.pop').slideFadeToggle();
                }
                return false;
            });

            $('.close').on('click', function() {
                deselect($('#add_recipes_list'));
                return false;
            });
        });

        $.fn.slideFadeToggle = function(easing, callback) {
            return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
        };


    </script>



@endsection