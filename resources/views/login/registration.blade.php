<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,height=device-height initial-scale=1">


    <!-- Flaticon -->

    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="images/favicon.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/favicon.ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">


    <title>Sniez | We make sure you won't</title>


    <style>

        body {

            background-image: url("images/backgrounds/bg_login.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: repeat;

            height: 100vh;
            max-height: 130vh;

            font-family: 'Roboto Slab', sans-serif;

        }

        .login {


            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            padding: 80px 0;
            z-index: 20;

            width: 90%;
            margin-left: 5%;
            margin-top: 24px;

            background-color: white;

        }

        #login-logo {

            background-color: #88caab;
            padding: 3.5em 2.2em;
            border-radius: 100%;
            width: 5em;

            align-self: center;
        }

        #login-logo img{

            width: 5em;
        }


        #login-form {

            display: flex;
            justify-content: center;
            margin-top: 24px;

        }

        #login-form form {

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #login-form form h3 {

            font-size: 1.8em;
            font-weight: 400;
            text-align: center;
            color: darkgrey;

        }

        #login-form form input {

            margin-top: 24px;
            width: 280px;
            font-size: 0.8em;
            font-weight: 400;
            color: #88caab;
            border: none;
            border-bottom: 1px solid #88caab;
            padding-bottom: 16px;
        }

        #login-form form #login-form-name input {

            width:120px;
            margin-right: 16px;
        }
        #login-form form input::-webkit-input-placeholder {

            opacity: 0.5;
        }

        #login-form button {

            width: 120px;
            align-self: center;
            font-size: 0.8em;
            color: #88caab;
            background-color: white;
            border-color: #88caab;
            padding: 16px 0;
            margin-top: 24px;

        }

        #login-form button:hover {

            color: white;
            background-color: #88caab;

        }

        #login-form a {

            font-size: 0.6em;
            margin-top: 32px;
        }

        #login-text {

            display: none;
        }

        @media screen and (min-width: 1100px) {

            body {

                background-position: bottom;
            }

            #login-text {

                display: flex;
                width: 70%;
                margin-left: 15%;
                flex-direction: column;
                justify-content: center;
                margin-top: 50px;
            }

            #login-text img {

                width: 100px;
            }

            #login-text p {

                font-weight: 400;
                font-size: 1.2em;
                letter-spacing: 0.5px;
                line-height: 1.8em;
                font-style: italic;
                color: darkgrey;
                text-align: center;


            }

            #login-text h1 {

                font-weight: 400;
                font-size: 1.2em;
                font-style: italic;
                color: darkgrey;
                text-align: center;
                margin-top: -5px;
            }

            .login {


                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-top: -20px;
                padding: 50px 0px;
                z-index: 20;

                width: 40%;
                height: 90vh;
                margin-left: 60%;

                background-color: white;

            }

            #login-logo {

                background-color: #88caab;
                padding: 4em 2.2em;
                border-radius: 100%;
                width: 7em;

                align-self: center;
            }

            #login-logo img{

                width: 7em;
            }

            #login-btn {

                background-color: #A0D1E6;
                width: 20em;
                align-self: center;

                margin-top: 50px;
            }

            #login-btn:hover {

                background-color: #88caab;
                color: white;
            }

            #login-btn a {

                font-family: 'Lato', sans-serif;
                font-weight: 100;
                font-size: 1em;
                text-decoration: none;
                color: white;
                text-align: center;
            }

            #login-btn span {

                color: #61A0BB;
            }

            #login-form {

                margin-top: 24px;
            }


            #login-form form h3 {

                font-size: 1em;

            }

            #login-form form input {

                margin-top: 24px;
                margin-bottom: 24px;
                width: 320px;
                font-size: 1em;
            }

            #login-form form #login-form-name input {

                width:150px;
                margin-right: 24px;
            }

            #login-form button {

                width: 19em;
                font-size: 1em;
                margin-top: 16px;
            }

            #login-form a {

                font-size: 1em;
                margin-top: 20px;
            }



        }




    </style>

</head>

<body>

    @if(Session::has('message'))
        <p class="{{ Session::get('class') }}">{{ Session::get('message') }}</p>
    @endif

    <div class="layover">

    </div>

    <div class="login">


        <div id="login-logo">

            <img src="/images/logo/logo_ei.png" alt="logo Sniez">

        </div>

        <div id="login-form">

            <form action="{{URL::action('Auth\RegisterController@emailRegistration')}}" enctype="multipart/form-data" method="POST">

                {{ csrf_field() }}

                <input type="file" name="avatar" placeholder="profiel foto">

                <div id="login-form-name">
                    <input name="firstname" placeholder="Voornaam" type="text">
                    <input name="lastname" type="text" placeholder="Naam">
                </div>

                <input name="email" placeholder="Je e-mailadres" type="email">
                <input name="password" type="password" placeholder="Je wachtwoord">
                <button type="submit">Go</button>
                <a style="text-align: center; color: #88caab;" href="/login">Ik heb al een account</a>
            </form>

        </div>

        <!--<div id="login-text">

            <p>" Laat je allergiëen niet in de weg staan om heerlijk te koken. "</p>
            <h1>- <img src="images/libelle-lekker.png"></h1>

        </div>-->



    </div>

</body>
</html>