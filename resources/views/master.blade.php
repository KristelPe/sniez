<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,height=device-height initial-scale=1">


        <title>Sniez | We make sure you won't</title>

        <!-- Fonts -->


    <style>
        body

        {

            height: 80vh;
            max-height: 90vh;

            font-family: 'Lato', sans-serif;
        }
    </style>
    </head>

    <body>
    @if($_SERVER['REQUEST_URI'] != "/")
        @include("partials.nav")
    @endif

    @yield('content')

    </body>
</html>
