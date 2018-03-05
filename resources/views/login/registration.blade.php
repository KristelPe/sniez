@extends('master')

@section('content')
    <link rel="stylesheet" href="/css/easy-autocomplete.min.css">
    <link rel="stylesheet" href="/css/easy-autocomplete.themes.min.css">
    <style>

        body {

            /*background-image: url("images/backgrounds/bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 110vh;*/
        }

        .search {

            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 10px;

        }

        .search input {

            width: 100%;
            height: 30px;
        }

        #btn_search {

            background-color:  #E55266;
            color: white;
            border-color: transparent;

            margin-left: 10px;
            border-radius: 4px;

            box-shadow: 1px 1px lightgrey;
        }

        #btn_search:hover {

            background-color: #F4BF73;
        }

        #allergies-box {

            background-color: white;
            width: 90%;
            margin-left: 2.5%;

            position: absolute;
            z-index: 2;
        }

        #allergies-form .allergies__container {

            overflow: scroll;
            height: 60vh;
        }

        .allergies__container{

            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            list-style-type: none;

        }

        .allergies__container li {

            display: flex;
            flex-direction: row;
            justify-content: center;
            background-color: #F4BF73;
            border-color: transparent;

            width: 300px;
            padding: 1em;
            margin-left: -50px;
            margin-top: -20px;

            -webkit-box-shadow: 0 1px 2px lightgrey;
            -moz-box-shadow: 0 2px 1px lightgrey;
            box-shadow: 0 2px 1px lightgrey;
        }

        #btn_save {

            background-color:  #A0D1E6;
            color: white;
            border-color: transparent;
            width: 100%;
            text-align: center;
            padding: 10px 10px;

        }


        /*.allergies__container li img{
            width: 100px;
        }*/

        /*.header {

            background-color: #E55266;
            width: 100%;
            height: 50px;
            display: flex;
            flex-direction: row;
            justify-content: center;

        }

        #header-logo {

            background-color: #E55266;
            padding: 2em 1.2em;
            border-radius: 100%;
            width: 4em;

           align-self: center;
            margin-top: 50px;

            position: absolute;
            z-index: 5;
        }

        #header-logo img{

            width: 4em;

        }*/

        .title {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            width: 100%;

            background-color:#A0D1E6 ;
            border-radius: 10px 10px 0px 0px;
        }

        .title h1 {

            font-size: 0.8em;
            text-align: center;

            font-weight: 200;
            color:white;
            padding-left: 2em;
            padding-right: 2em;
            padding-bottom: 1em;


        }

        .title img {

            width: 50px;
            height: 50px;
            margin-top: 20px;
            align-self: center;
            border-radius: 100%;
            border: 4px solid white;
        }

        #search{

            padding: 4px;
            border-radius: 4px;
            border: 1px solid lightgray;
        }

        #not_found{
            border: 1px solid rgba(220, 20, 60, 0.3);
            padding: 8px 0;
            font-size: 12px;
            align-self: center;
            color: black;
            display: none;
            text-align: center;
            width: 100%;
            margin-top: 2em;
            margin-left:-1px;
        }

        .allergies__container label{
            margin: 1em;
        }

        .allergy img {

            width: 50px;
            margin-right: 10px;
        }

        .allergy p {

            color:white;
            font-weight: 200;
        }

        #allergies-form input {

            width: 20px;
            height: 20px;
            background-color: #F4BF73 ;
            border-radius: 100%;
            margin-left: 20px;
        }
    </style>



    <!--<div class="header">

        <div id="header-logo">
        <img src="/images/logo/logo_ei.png">
        </div>

    </div>-->

    <div id="allergies-box">

    <div class="title">

        <img src="{{$user->avatar}}" alt="profilepicture" id="avatar">
        <h1>Aan welke soorten voedingsproducten ben je allergisch?</h1>

    </div>

        <div class="search">
            <input id="search" type="text" value="" placeholder="Zoek hier">
            <!--<input id="search_val" type="text" value="" hidden>-->
            <button id="btn_search" onclick="search()">Zoek</button>
        </div>

    <div id="allergies-form">
    <form method="post" action="{{URL::action('AllergyController@store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p id="not_found">Geen allergiëen gevonden</p>
        <ul class="allergies__container">
            @foreach($allergies as $allergy)
                <label for="{{$allergy->id}}">
                    <li class="allergy">
                        <img src="{{$allergy->path}}" alt="allergy_icon" id="allergy_icon">
                        <p>{{$allergy->name}}</label>
                        <input id="{{$allergy->id}}" type="checkbox" value="{{$allergy->id}}" name="allergies[]">
                    </li>
                </label>
            @endforeach
        </ul>


        <button type="submit" id="btn_save">Klaar!</button>
    </form>
    </div>
    </div>





    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="/js/jquery.easy-autocomplete.min.js"></script>
    <script>
        // easy-autocomplete documentation -> http://easyautocomplete.com/guide
        // themes -> http://easyautocomplete.com/themes
        var options = {
            data:[ {"name": "all", "allergy_id": "" },
                @foreach($allergies as $allergy)
                    {"name": "{{$allergy->name}}", "allergy_id": "{{$allergy->id}}" },
                @endforeach
            ],
            getValue: "name",
            theme: "bootstrap",
            minLength: 3,
            list: {
                match: {
                    enabled: true
                    },
                onSelectItemEvent: function () {
                    var value = $("#search").getSelectedItemData().allergy_id;
                    $("#search_val").val(value);
                }
            }
        };

        //$("#search").easyAutocomplete(options);

        $("#search").keypress(function(e) {
            if(e.which == 13) {
                search();
            }
        });

        $('#search').on('input', function() {
            if ($(this).val() == ""){
                $( ".allergy").css( "display", "block" );
            }
        });

        function search() {
            /*var items = $(".allergy");
            var id = $("#search_val").val();
            for(var i = 0; i < items.length; i++){
                if(id != "" && items[i].id != id){
                    items[i].style.display = "none";
                } else if(id == ""){
                    items[i].style.display = "block";
                }
            }*/
            var search = $("#search").val();
            if (search == ""){
                $( ".allergy").css( "display", "block" );
            } else {
                $( ".allergy").css( "display", "none" );
                $( ".allergy:contains("+search+")").css( "display", "block" );
            }
            if($(".allergy").is(":visible")){
                $("#not_found").css("display", "none");
            } else {
                $("#not_found").css("display", "block");
            }
        }
    </script>
@endsection