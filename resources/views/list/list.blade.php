@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list/list.css') }}" />


<div id="list_header"></div>

<div id="list_avatar">
        <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
</div>

<h1 class="list-title">{{$list->name}}</h1>

<div id="recipes_all" class="drop-down-show-hide">
            @foreach($listItems as $l)
                <div class="recipes_recipe">
                    <a style="background-image:url('{{$l->img}}'); background-size: cover;" href="/{{$list->type}}/{{$l->id}}">
                        <p>{{$l->titel}}</p>
                    </a>
                </div>
            @endforeach
        </div>
@endsection