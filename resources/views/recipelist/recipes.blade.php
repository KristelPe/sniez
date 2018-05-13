@extends('master')

@section('content')

    <style>


        #recipes_header {

            width: 100%;
            height: 12em;
            background-image: url("images/backgrounds/bg_recipes.jpg");
            background-size: cover;
            background-position: bottom;
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

            -webkit-appearance: none;
            -moz-appearance: none;

            background-image: url("images/down-arrow.png"); /* For Chrome and Safari */
            background-position: 200px;
            background-repeat: no-repeat;
            background-size: 15px;

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
            text-align: center;

            padding: 10px 50px;
        }

        #recipes_dropDown option {

            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .search{

            display: flex;
            justify-content: center;
            margin: auto;
            margin-top: 20px;
        }

        .input_search{
            border-radius: 3px;
            border: 1px solid #F4BF73;
            padding: 1em;
            width: 200px;
        }

        .btn_search{
            background-image: url(/images/icons/search-orange.svg);
            background-repeat: no-repeat;
            background-size: 100%;
            border: 0;
            text-indent: -9999px;
            margin-left: -3em;
            align-self: center;
        }

        #recipes_allergies {

            display: flex;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;

            margin-left: -5%;

            margin-top: 10px;
        }

        .recipes_allergy {

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

        .recipes_allergy img {

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
            margin-left: auto;

            margin-top: 20px;
            margin-bottom: 100px;
        }

        #add_recipes_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

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



        .recipes_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .recipes_list a {

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

        .recipes_list a .img_list {

            width: 140px;
            height: 112px;
            background-color: #A0D1E6;
            background-image: url('../images/logo/logo_ei.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .recipes_list a .img_list img {

            width: 180px;
            /*margin-top: -8px;*/
            height: auto;
            z-index: 0;

        }



        .recipes_list a .info_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

            background-color: white;
        }

        .recipes_list a .info_list p {

            margin-left: 20px;
            color: #3f3f3f;
            font-weight: 400;
            align-self: center;
            width: 100px;
        }

        .recipes_list a .info_list span {

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

        .recipes_recipe {

            margin-top: 20px;
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

            -webkit-box-shadow: 0 2px 4px darkgrey;
            -moz-box-shadow: 0 2px 4px darkgrey;
            box-shadow: 0 2px 4px darkgrey;
        }

        .recipes_recipe a img {

            width: 400px;
            height: auto;
            z-index: 0;
        }

        .recipes_recipe a p {

            position: absolute;
            color: black;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.95);
            font-size: 0.9em;

            width: 240px;
            margin-top: 100px;
            padding: 20px 5px;

        }

        #reset{
            background-color: #A0D1E6;
        }

        @media screen and (min-width: 768px) {

            #recipes_saved {

                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-around;

                width: 100%;

                margin-top: 50px;
            }

            .input_search{
                width: 300px;
            }

            #recipes_allergies {

                width: 80%;
                margin-left: 10%;
                margin-top: 30px;
            }

            #recipes_all {

                justify-content: space-around;
            }




        }

        @media screen and (min-width: 1240px) {


            select {

                -webkit-appearance: none;
                -moz-appearance: none;

            }
            
            #recipes_saved {

                width: 80%;
                margin-left: 10%;
                margin-bottom: 100px;
            }

            .input_search{
                width: 300px;
            }

            #recipes_allergies {

                width: 50%;
                margin-left: 25%;
                margin-top: 30px;
            }

            #add_recipes_list {

                display: block;
            }

            #add_recipes_list a {

                width: 400px;
                height: 240px;
            }

            #add_recipes_list a img {

                width: 50px;
                height: 50px;

                margin-left: 75px;
                margin-right: 75px;

            }

            #add_recipes_list a #text_add {

                width: 200px;
            }

            #add_recipes_list a p {

                margin-left: -5px;
            }

            #add_list_form {

                margin-top: 0px;
                display: none;
            }

            #add_list_form form {

                width: 400px;
                height: 240px;

                border-radius: 4px;

                -webkit-box-shadow: 0 2px 4px darkgrey;
                -moz-box-shadow: 0 2px 4px darkgrey;
                box-shadow: 0 2px 4px darkgrey;
            }

            #add_list_form input {

                color: #f3be7d;
                font-weight: 400;
                font-size: 0.9em;
            }

            #add_list_form form button:hover {

                background-color: darkgrey;

            }


            .recipes_list {

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

            .recipes_list a {

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


            .recipes_list a .img_list {

                width: 240px;
                height: 240px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
            }

            .recipes_list a .img_list img {

                width: 240px;
            }

            #recipes_all {

                width: 80%;
                margin-left: 10%;

            }

        }



    </style>


    <div id="recipes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div>
            <div id="recipes_header"></div>

            <div id="recipes_avatar">
                <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
            </div>

            <select id="recipes_dropDown">
                <option class="recipes_dropDown_select" value="recipes_saved">Bewaarde recepten</option>
                <option class="recipes_dropDown_select" value="recipes_all">Alle recepten</option>
            </select>

            <div id="recipes_allergies">
                @foreach($user_allergies as $a)
                    <div class="recipes_allergy">
                        <img class="removeA" src="images/cancel.png" alt="deleteBtn"> <p>{{$a->allergies->name}}</p>
                    </div>
                @endforeach

                <div id="reset" class="recipes_allergy">
                   <p>Reset</p>
                </div>

                <div class="search">
                    <input class="input_search" type="text" placeholder="Zoek hier een recept...">
                    <button class="btn_search">Zoek</button>
                </div>
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
                <div class="recipes_list">
                    <a href="/list/{{$list->id}}">
                        <div class="img_list"><img src="{{$list->img}}"></div>
                        <div class="info_list">
                        <p>{{$list->name}}</p>
                        <span><p style="color: #a3a3a3;">X recepten</p></span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>


        <div id="recipes_all" class="drop-down-show-hide">
            @foreach($recipes as $r)
                <div class="recipes_recipe">
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

        $(".removeA").on("click", function () { 
            $(this).parent().hide(); 
            updateList();
        });

        $('#reset').on("click", function(){
            $('.recipes_allergy').show();
            updateList();
        });

        function updateList(){
            var allergies = [];

            $(".removeA:visible").siblings().each(function( i ) {
                allergies.push(this.innerHTML);
            });

            $.ajaxSetup({
                headers:  { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                type: 'post',
                url: "{{URL::action('RecipeController@getCustomRecipes')}}",
                data: {allergies: allergies},
                success: function (response) {
                    $('#recipes_all').empty();
                    $.each( response, function( key, value ) {
                        $("#recipes_all").append(' <div class="recipes_recipe"><a href="/recipe/'+ value.id +'"><img src="'+ value.img +'" alt="recipe"> <p>' + value.titel + '</p> </a> </div>');
                    });
                }
            });
        }

    </script>



@endsection