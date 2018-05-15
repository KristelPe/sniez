@extends('master')

@section('content')

    <style>


        #products_header {

            width: 100%;
            height: 12em;
            background-image: url("/images/backgrounds/bg_profile.jpg");
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;

            z-index: -2;
        }

        #products_avatar {

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #products_avatar img {

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

        #products_avatar h1 {

            text-align: center;
            font-size: 1em;
            letter-spacing: 1px;
        }

        #products_dropDown {

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

            background-color: #88caab;
            color: white;
            letter-spacing: 1px;
            font-size: 0.8em;
            font-weight: 400 ;
            border: none;
            border-radius: 0%;
            text-align: center;

            padding: 10px 50px;
        }

        #products_dropDown option {

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

        #products_allergies {

            display: flex;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;

            margin-left: -5%;

            margin-top: 10px;
        }

        .products_allergy {

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

        .products_allergy img {

            width: 10px;
            height: 10px;
            margin-top: 15px;
            margin-right: 10px;
        }

        #products_saved {

            display: flex;
            flex-direction: column;
            justify-content: center;

            width: 90%;
            margin-left: auto;

            margin-top: 20px;
            margin-bottom: 100px;
        }

        #add_products_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        #add_products_list a {

            display: flex;
            flex-direction: row;
            background-color: #88caab ;

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

        #add_products_list a img {

            width: 40px;
            height: 40px;

            margin-left: 50px;
            margin-right: 50px;

            align-self: center;

        }

        #add_products_list a #text_add {
            display: flex;
            flex-direction: column;
            justify-content: center;

            background-color: white;
        }

        #add_products_list a p {

            margin-left: 20px;
            color: #3f3f3f;
            font-weight: 400;
            align-self: center;
            font-size: 0.8em;
        }

        #add_list_form {

            position: absolute;
            width: 100%;
            height: 100%;
            display: none;
            top:0;
            left: 0;

        }

        #add_list_form form {

            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;


            display: flex;
            flex-direction: column;
            justify-content: center;


            background-color: rgba(136, 202, 171, 0.95);

        }

        #add_list_form form input {
            color: white;
            font-weight: 400;
            font-size: 1.6em;
            font-style: italic;
            letter-spacing: 1px;
            width: 70%;
            margin-left: 25%;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid white;
        }

        #add_list_form form h3 {

            color: white;
            font-size: 1.2em;
            font-weight: 400;
            font-style:italic;
            width: 70%;
            margin-left: 15%;
        }

        #add_list_form form input::-webkit-input-placeholder  {

            color:white;
            opacity: 0.5;
            font-style: italic;
            font-weight: 100;
            letter-spacing: 1px;

        }

        #add_list_form form button {

            color: white;
            padding: 10px;
            width: 50%;
            margin-left: 25%;
            margin-top: 80px;
            background-color: #f3be7d;
            font-size: 1em;

        }

         .products_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .products_list a {

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

        .products_list a .img_list {

            width: 140px;
            height: 112px;
            background-color: #88caab;
            background-image: url('../images/logo/logo_ei.png');
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .products_list a .img_list img {

            width: 180px;
            /*margin-top: -8px;*/
            height: auto;
            z-index: 0;

        }

        .products_list a .info_list {

            display: flex;
            flex-direction: column;
            justify-content: center;

            background-color: white;
        }

        .products_list a .info_list p {

            margin-left: 20px;
            color: #3f3f3f;
            font-weight: 400;
            align-self: center;
            width: 100px;
        }

        .products_list a .info_list span {

            font-size: 0.6em;
            margin-top: -20px;
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

        #reset{
            background-color: lightgrey;
        }

        @media screen and (min-width: 768px) {

            #products_saved {

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

            #products_allergies {

                width: 80%;
                margin-left: 10%;
                margin-top: 30px;
            }

            #products_all {

                justify-content: space-around;
            }




        }

        @media screen and (min-width: 1240px) {


            select {

                -webkit-appearance: none;
                -moz-appearance: none;

            }

            #products_saved {

                width: 80%;
                margin-left: 10%;
                margin-bottom: 100px;
            }

            .input_search{
                width: 300px;
            }

            #products_allergies {

                width: 50%;
                margin-left: 25%;
                margin-top: 30px;
            }

            #add_products_list a {

                width: 400px;
                height: 240px;
            }

            #add_products_list  a img {

                width: 50px;
                height: 50px;

                margin-left: 75px;
                margin-right: 75px;

            }

            #add_products_list  a #text_add {

                width: 200px;
            }

            #add_products_list  a p {

                margin-left: -5px;
            }

            #add_list_form {

                position: absolute;
                width: 100%;
                height: 100%;
                top:0;
                display: none;
            }

            #add_list_form form {

                position: absolute;
                width: 100%;
                height: 100%;
                margin: 0;


                display: flex;
                flex-direction: column;
                justify-content: center;


                background-color: rgba(136, 202, 171, 0.95);

            }

            #add_list_form form input {

                width: 50%;
                margin-left: 25%;
                padding-bottom: 8px;
                margin-top: 20px;


            }

            #add_list_form form h3 {

                color: white;
                font-size: 1.8em;
                font-weight: 400;
                font-style:italic;
                margin-left: 25%;
            }

            #add_list_form form input::-webkit-input-placeholder  {

                color:white;
                opacity: 0.5;
                font-style: italic;
                font-weight: 100;
                letter-spacing: 1px;

            }

            #add_list_form form button {

                width: 20%;
                margin-left: 40%;
                font-size: 1em;
                border: none;
                margin-top: 80px;
            }

            #add_list_form form button:hover {

                background-color: darkgrey;


            }


            .products_list {

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

            .products_list a {

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


            .products_list a .img_list {

                width: 240px;
                height: 240px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
            }

            .products_list a .img_list img {

                width: 240px;
            }

            #products_all {

                width: 80%;
                margin-left: 10%;

            }

        }






    </style>


    <div id="products">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div>
            <div id="products_header"></div>

            <div id="products_avatar">
                <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
            </div>

            <select id="products_dropDown">
                <option class="products_dropDown_select" value="products_saved">Bewaarde producten</option>
                <option class="products_dropDown_select" value="products_all">Alle producten</option>
            </select>

            <div id="products_allergies">
                @foreach($user_allergies as $a)
                    <div class="products_allergy">
                        <img class="removeA" src="images/cancel.png" alt="deleteBtn"> <p>{{$a->allergies->name}}</p>
                    </div>
                @endforeach

                <div id="reset" class="products_allergy">
                    <p>Reset</p>
                </div>

                <div class="search">
                    <input class="input_search" type="text" placeholder="Zoek hier een product...">
                    <button class="btn_search">Zoek</button>
                </div>
            </div>
        </div>

        <div id="products_saved" class="drop-down-show-hide">
            <div id="add_products_list">
                <a href="#">
                    <img src="images/add.png" alt="add_list">
                    <div id="text_add">
                        <p>Voeg een nieuw bord toe</p>
                    </div>
                </a>
            </div>

            <div id="add_list_form">

                <form action="" method="POST">

                    <h3>Vul hier de naam in van je lijstje</h3>
                    {{ csrf_field() }}
                    <input name="name_list" placeholder="Bv. Zoetigheden, Kerstmis,..." type="text">
                    <input name="img_list" type="text" style="display: none">
                    <button type="submit">Verzenden</button>
                    <a style="text-align: center; color: white; margin-top: 30px;" href="/products">Cancel</a>
                </form>
            </div>

            @foreach($products_lists as $list)
                <div class="products_list">
                    <a href="/list/{{$list->id}}">
                        <div class="img_list"
                            
                        @if($list->img != "")    
                            style="background-image: url('{{$list->img}}'); background-size: cover;" 
                        @endif
                            
                        ></div>
                        <div class="info_list">
                            <p>{{$list->name}}</p>
                            <span><p style="color: #a3a3a3;">X producten</p></span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>


        <div id="products_all" class="drop-down-show-hide">
            @foreach($all_products as $ap)
                <div class="products_product">
                    <a style="background-image: url('{{$ap->img}}');" href="/product/{{$ap->id}}">
                        <p>{{$ap->titel}}</p>
                    </a>
                </div>
            @endforeach
        </div>


    </div>

    <script>

        $('#products_saved').show();
        $('#products_all').hide();

        $('#products_dropDown').change(function () {
            $('.drop-down-show-hide').hide();
            $('#' + this.value).show();

        });

        // POPUP FORM

        $(function() {

            // contact form animations
            $('#add_products_list').click(function() {
                $('#add_list_form').fadeToggle();
            })
            $(document).mouseup(function (e) {
                var container = $("#add_list_form");

                if (!container.is(e.target)
                    && container.has(e.target).length === 0)
                {
                    container.fadeOut();
                }
            });

        });

        $(".removeA").on("click", function () {
            $(this).parent().hide();
            updateList();
        });

        $('#reset').on("click", function(){
            $('.products_allergy').show();
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
                    $('#products_all').empty();
                    $.each( response, function( key, value ) {
                        $("#products_all").append(' <div class="products_product"><a href="/recipe/'+ value.id +'"><img src="'+ value.img +'" alt="product"> <p>' + value.titel + '</p> </a> </div>');
                    });
                }
            });
        }



    </script>





@endsection