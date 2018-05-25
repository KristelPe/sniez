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

        #scanned_warning {

            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 24px;
        }

        #scanned_warning p {

            text-align: center;
            font-weight: 400;
            color: white;
            width: 80%;
            padding: 20px 0px;
            align-self: center;
        }

        .scanned_warning_green {

            background-color: #88caab;
        }

        .scanned_warning_red {

            background-color: #E55266;


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

        #product_save_dropdown {

            position: absolute;
            width: 100%;
            height: 100%;
            display: none;
            top:0;
            left: 0;

            z-index: 10;


            flex-direction: column;
            justify-content: center;


            background-color: rgba(136, 202, 171, 0.95);

        }

        #product_save_dropdown h3 {

            color: white;
            text-align: center;
            font-weight: 400;
            margin-top: 120px;
            width: 80%;
            margin-left: 10%;
        }

        #product_save_lists {

            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 40px;
        }



        #product_save_lists a p {

            text-align: center;
            color: white;

            padding: 40px;
            background-color: white;
            background-size: 30%;
            background-repeat: no-repeat;
            background-position: 50% 50%;

            border: 2px solid white;
            margin: auto;
            font-size: 1.5em;

        }

        #product_save_lists a p:hover {

            border: 4px solid white;
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

         h1 {

            font-size: 1em;
            font-weight: 400;
            margin-bottom: 24px;
             text-align: center;
             margin-top: 50px;
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

        .recipes_recipe a img {

            width: 400px;
            height: auto;
            z-index: 0;
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

        @media screen and (min-width: 1240px) {

            #scanned_product {

                display: flex;
                flex-direction: column;
                justify-content: space-between;

                width: 800px;
                padding-bottom: 50px;
            }

            #scanned_product_info {

                display:flex;
                flex-direction: row;
                justify-content: center;

            }

            #scanned_product_info p {

                align-self:center;
                font-size: 1.2em;
                text-align: left;
                width: 40%;
            }

            #product_save {

                align-self: flex-end;
                margin-right: 190px;
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-top: -80px;
            }
            
            #product_save button {

                height: 38px;

            }

            #product_save p {

                width: 100%;
                margin-top: 20px;
                font-size: 0.9em;
            }

            #product_save_dropdown {

                position: absolute;
                width: 100%;
                height: auto;
                bottom: 0;
                padding-bottom: 100px;

            }


            #product_save_dropdown h3 {

                color: white;
                text-align: center;
                font-weight: 400;
                margin-top: 120px;
                width: 80%;
                margin-left: 10%;
            }




            #product_save_lists a p {

                text-align: center;
                color: white;

                width: 400px;
                padding: 100px 0px;
                background-color: #A0D1E6;
                background-size: cover;
                background-repeat: no-repeat;

                border-radius: 4px;
                margin: auto;
                margin-top: 24px;
                font-size: 1.5em;

            }

            #scanned_proposals {

                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-start;

                width: 90%;
                margin-left: 5%;

                margin-top: 20px;
                z-index: 0;


            }

            h1 {

                font-size: 1.2em;
                font-weight: 400;
                margin-top: 80px;
                margin-bottom: 24px;
                margin-left: 5%;
                text-align: left;
            }

            #recipes_recipe a {

                width: 80%;
                margin-left: 10%;
            }




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


        <div id="scanned_warning">

            @if($alerts == null)

            <p class="scanned_warning_green">Dit product is veilig voor je.</p>

            @else

                <p  class="scanned_warning_red">Let op dit product bevat:
                    @foreach($alerts as $key => $a)
                        @if (count($alerts) == ($key+1))
                            {{$a}}
                        @else
                            {{$a}},
                        @endif
                    @endforeach
                </p>

            @endif

        </div>

        <div id="scanned_product">

            <div id="scanned_product_info">
            <img src="{{$product->img}}" alt="scanned product">
            <p>{{$product->titel}}</p>
            </div>

            <div id="product_save">

                <button>+</button>
                <p>Voeg toe aan één van je lijstjes</p>

            </div>
        </div>

        <div id="product_save_dropdown">

            <h3>Kies een lijstje waar je recept zal worden bewaard.</h3>
            <div id="product_save_lists">

                @foreach($products_lists as $l)

                    <a onclick="location.href='/product/'+ {{$product->id}} +'/addToList/{{$l->id}}'"><p  style="background-image: url({{$l->img}})";>{{$l->name}}</p></a>

                @endforeach

            </div>

            <a style="text-decoration: none;" href="/product/{{$product->id}}"><p style="text-align: center;font-size: 0.8em; margin-top: 40px; color: white;">Ik doe dit later wel.</p></a>

        </div>

        <h1>Voorgestelde recepten:</h1>

        <div id="scanned_proposals">



            @foreach($all_recipes as $r)
                <div class="recipes_recipe">
                    <a style="background-image:url('{{$r->img}}');" href="/recipe/{{$r->id}}">
                        <p>{{$r->titel}}</p>
                    </a>
                </div>
            @endforeach
            
            


        </div>

    </div>

    <script>

        // POPUP FORM

        $(function() {

            // contact form animations
            $('#product_save').click(function() {
                $('#product_save_dropdown').fadeToggle();
            })
            $(document).mouseup(function (e) {
                var container = $("#product_save_dropdown");

                if (!container.is(e.target)
                    && container.has(e.target).length === 0)
                {
                    container.fadeOut();
                }
            });

        });

    </script>

@endsection