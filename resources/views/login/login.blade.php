@extends('master')

<style>

body {

    background-repeat: no-repeat;
    background-size: cover;


    -webkit-animation-name: changeBG;
    -webkit-animation-duration: 50s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
}

.layover {
    background-color: rgba(0, 0, 0, 0.18);

    width: 100%;
    height: 104vh;

    margin-top: -8em;
    margin-left: -0.5em;

    position: absolute;
    z-index: -2;

}

.login {

    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-top: 130px;
    z-index: 1;

}

#login-logo {

    background-color: #E55266;
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
    width: 12em;
    align-self: center;

    margin-top: 50px;
}

#login-btn:hover {

    background-color: #E55266;
    color: white;
}

#login-btn a {

    font-family: 'Lato', sans-serif;
    font-weight: 100;
    font-size: 0.9em;
    text-decoration: none;
    color: white;
    text-align: center;
}

#login-btn span {

    color: #61A0BB;
}

@-webkit-keyframes changeBG {
    0% {
        background-image: url("images/backgrounds/bg2.jpg");
        background-position: right;
    }
    50% {
        background-image: url("images/backgrounds/bg1.jpg");
        background-position: left;
    }
    100% {
        background-image: url("images/backgrounds/bg3.jpg");
        background-position: right;
    }
}



</style>

@section('content')

    <div class="layover">

    </div>

    <div class="login">

        <div id="login-logo">

            <img src="/images/logo/logo_ei.png" alt="logo Sniez">

        </div>

        <div id="login-btn">
            <a href="/login/facebook"><p>Login met <span>Facebook</span></p></a>

        </div>

    </div>

@endsection