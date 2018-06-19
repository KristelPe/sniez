@extends('master')
@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile/edit.css') }}" />

    <!-- EDITPAGE -->
  
<div id="edit_header"></div>

<div id="edit_avatar">
    <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
</div>

@if(Session::has('message'))
    <p class="{{ Session::get('class') }}">{{ Session::get('message') }}
        @if(Session::has('message2') && Session::get('class2') == Session::get('class'))
        <br>{{ Session::get('message2') }}
        @endif
    </p>
    @if(Session::has('message2') && Session::get('class2') != Session::get('class'))
        <p class="{{ Session::get('class2') }}">{{ Session::get('message') }}</p>
    @endif
@endif

<form action="{{URL::action('UserController@updateProfile')}}" enctype="multipart/form-data" method="post">

    {{ csrf_field() }}

    <input name="firstname" class="edit_input" type="text" placeholder="Voornaam">
    <input name="lastname" class="edit_input" type="text" placeholder="Naam">
    <input name="email" class="edit_input" type="email" placeholder="Email">

    <button class="edit_btn" type="submit">Save</button>
</form>

@endsection