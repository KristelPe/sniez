@extends('registration.master')

<style>

    .login {

        margin-top: 100px;
        margin-bottom: 100px;
        font-family: 'Lato', sans-serif;
    }

    #login a {

        text-decoration: none;
    }

    #login a p {


        color: white;
        text-align: center;
        padding-top: 25px;
        margin-left: 37.5%;
        border-radius: 20px;
        background-color: #7184ff;
        width: 20%;
        height: 50px;
    }


</style>

@section('content')

    <div class="login">

        <div id="login">
            <a href="/login/facebook"><p>Login with Facebook</p></a>

        </div>

    </div>

@endsection