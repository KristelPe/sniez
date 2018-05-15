@extends('master')

@section('content')

<style>
    
    #list_header {
        width: 100%;
        height: 12em;
        background-image: url("/images/backgrounds/bg_recipes.jpg");
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;


        z-index: 2;
    }

    #list_avatar {

        display: flex;
        flex-direction: column;
        justify-content: center;
    }
     
    #list_avatar img {

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

    #list_avatar h1 {

        text-align: center;
        font-size: 1em;
        letter-spacing: 1px;
    }
    
    .recipes_recipe {
        margin-top: 20px;
        margin-left: 1em;
        margin-right: 1em;
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
    
    #recipes_all {

        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;

        width: 90%;
        margin-left: 5%;

        margin-top: 20px;
    }
    
    .list-title{
        color: black;
        text-align: center;
    }

    @media screen and (min-width: 768px) {
        #recipes_all {
            justify-content: space-around;
        }   
    }

</style>

<div id="list_header"></div>

<div id="list_avatar">
        <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
</div>

<h1 class="list-title">{{$list->name}}</h1>

<div id="recipes_all" class="drop-down-show-hide">
            @foreach($listItems as $l)
                <div class="recipes_recipe">
                    <a href="/recipe/{{$l->id}}">
                        <img src="{{$l->img}}" alt="recipe">
                        <p>{{$l->titel}}</p>
                    </a>
                </div>
            @endforeach
        </div>
@endsection