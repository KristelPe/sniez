@extends('master')

@section('content')

<style>

    #scanned_header {

        width: 100%;
        height: 12em;
        background-image: url("images/backgrounds/bg_recipes.jpg");
        background-size: cover;
        background-position: bottom;
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

</style>

<div id="scanned">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div>
        <div id="scanned_header"></div>

        <div id="scanned_avatar">
            <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
        </div>

    </div>

</div>


@endsection