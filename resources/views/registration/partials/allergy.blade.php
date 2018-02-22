@extends('registration.master')

@section('content')
    <link rel="stylesheet" href="/css/easy-autocomplete.min.css">
    <link rel="stylesheet" href="/css/easy-autocomplete.themes.min.css">
    <style>
        .allergies__container{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            list-style-type: none;
        }

        .allergies__container li{
            width: 100px;
            padding:1em;
            margin: 1em;
            border: 1px solid lightgray;
        }

        .allergies__container li img{
            width: 100px;
        }
    </style>

    <div class="search">
        <input id="search" type="text" value="">
        <input id="search_val" type="text" value="" hidden>
        <button id="btn_search" onclick="search()">Zoek</button>
    </div>

    <form method="post" action="{{URL::action('AllergyController@store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="allergies__container">
            @foreach($allergies as $allergy)
                <li id="{{$allergy->id}}" class="allergy">
                    <img src="{{$allergy->path}}" alt="{{$allergy->name}}">
                    <p>{{$allergy->name}}</p>
                    <input type="checkbox" value="{{$allergy->id}}" name="allergies[]">
                </li>
            @endforeach
        </ul>

        <button type="submit">Opslaan</button>
    </form>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="/js/jquery.easy-autocomplete.min.js"></script>
    <script>
        // easy-autocomplete documentation -> http://easyautocomplete.com/guide
        // themes -> http://easyautocomplete.com/themes
        var options = {
            data:[
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
                onChooseEvent: function () {
                    var value = $("#search").getSelectedItemData().allergy_id;
                    $("#search_val").val(value);
                }
            }
        };

        $("#search").easyAutocomplete(options);

        function search() {
            var items = $(".allergy");
            var id = $("#search_val").val();
            for(i = 0; i < items.length; i++){
                if(items[i].id != id){
                    items[i].style.display = "none";
                }
            }
        }
    </script>
@endsection