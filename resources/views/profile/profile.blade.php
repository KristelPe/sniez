@extends('master')

@section('content')

    <style>

        #profile_header {

            width: 100%;
            height: 12em;
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

        #profile_content {

            display: flex;
            flex-direction: column;

            width: 80%;
            margin-left: 10%;

            margin-top: 20px;
        }

        #profile_content_product {


            height: 80px;
            background-color: #A0D1E6 ;
            border-radius: 4px;

            display: flex;
            flex-direction: row;
            justify-content: center;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #profile_content_product:hover {

            background-color: #F4BF73;
        }

        #profile_content_product img {

            width: 40px;
            align-self: center;
        }

        #profile_content_product p {

            color: white;
            font-size: 0.8em;
            align-self: center;
            margin-left: 10px;
            font-weight: 100;
        }

        #profile_content_recipe {

            margin-top: 10px;
            height: 80px;
            background-color: #A0D1E6 ;
            border-radius: 4px;

            display: flex;
            flex-direction: row;
            justify-content: center;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #profile_content_recipe:hover {

            background-color: #F4BF73;
        }

        #profile_content_recipe img {

            width: 50px;
            align-self: center;
        }

        #profile_content_recipe p {

            color: white;
            font-size: 0.8em;
            align-self: center;
            margin-left: 10px;
            font-weight: 100;
        }

        #profile_content_links {

            margin-top: 10px;
            display: flex;
            flex-direction: row;
        }

        #profile_content_scan {

            width: 48.5%;
            height: 80px;
            background-color: #A0D1E6;
            border-radius: 4px;

            display: flex;
            flex-direction: column;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #profile_content_scan:hover {

            background-color: #F4BF73;
        }

        #profile_content_scan img {

            margin-top: 15px;
            width: 30px;
            align-self: center;
        }

        #profile_content_scan p {

            color: white;
            font-size: 0.5em;
            text-align: center;
            font-weight: 100;
            margin-top: 5px;
        }

        #profile_content_edit {

            margin-left: 3%;
            width: 48.5%;
            height: 80px;
            background-color: #A0D1E6;
            border-radius: 4px;

            display: flex;
            flex-direction: column;

            -webkit-box-shadow: 0 2px 4px lightgrey;
            -moz-box-shadow: 0 2px 4px lightgrey;
            box-shadow: 0 2px 4px lightgrey;
        }

        #profile_content_edit:hover {

            background-color: #F4BF73;
        }


        #profile_content_edit img {

            margin-top: 15px;
            width: 30px;
            align-self: center;
        }

        #profile_content_edit p {

            color: white;
            font-size: 0.5em;
            text-align: center;
            font-weight: 100;
            margin-top: 5px;
        }

        #profile_footer {

            position: absolute;
            bottom:0;
            height: 3em;
            width: 100%;

            margin-left: -2.5%;
            background-image: url("images/backgrounds/bg_profile.jpg");
            background-size: cover;
            background-repeat: no-repeat;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #profile_footer img {

            width: 50px;
            height: auto;
            border-radius: 100%;
            align-self: center;
        }

    </style>

    <div id="profile">

    <div id="profile_header">

    </div>

    <div id="profile_avatar">

        <img src="{{$user->avatar}}" alt="avatar">
        <h1>{{$user->name}}</h1>

    </div>

        <div id="profile_content">

            <div id="profile_content_product">

                <img src="images/icons/menu/product.png">
                <p>Mijn producten</p>

            </div>

            <a href="/recipes" style="text-decoration: none;">
            <div id="profile_content_recipe">



                <img src="images/icons/menu/recept.png">
                <p>Mijn recepten</p>



            </div>
            </a>

            <div id="profile_content_links">

                <div id="profile_content_scan">

                    <img src="images/icons/menu/scan.png">
                    <p>Scan een product</p>

                </div>

                <div id="profile_content_edit">

                    <img src="images/icons/menu/profile.png">
                    <p>Mijn profiel</p>

                </div>

            </div>

        </div>

        <div id="profile_footer">

            <img src="images/logo/logo_ei.png" alt="logo">

        </div>

    </div>

@endsection