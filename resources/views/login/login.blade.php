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

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login/login.css') }}" />

</head>
<body>

    <div class="layover">

    </div>

    <div class="login">


        <div id="login-logo">

            <img src="/images/logo/logo_ei.png" alt="logo Sniez">

        </div>



        <div id="login-btn">
            <a href="/login/facebook"><p>Login met <span>Facebook</span></p></a>
        </div>

        <div id="login-form">

            <form action="{{URL::action('Auth\LoginController@emailLogin')}}" enctype="multipart/form-data" method="POST">

                <h3>of meld je aan via e-mail</h3>
                {{ csrf_field() }}
                <input name="email" placeholder="Je e-mailadres" type="email">
                <input name="password" type="password" placeholder="Je wachtwoord">
                <button type="submit">Go</button>
                <a style="text-align: center; color: #88caab;" href="/register">Nog geen account?</a>
            </form>

        </div>

        <!--<div id="login-text">

            <p>" Laat je allergiëen niet in de weg staan om heerlijk te koken. "</p>
            <h1>- <img src="images/libelle-lekker.png"></h1>

        </div>-->



    </div>
</body>
</html>

