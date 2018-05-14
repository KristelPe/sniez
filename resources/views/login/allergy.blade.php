@extends('master')

@section('content')
    <link rel="stylesheet" href="/css/easy-autocomplete.min.css">
    <link rel="stylesheet" href="/css/easy-autocomplete.themes.min.css">
    <style>
        .search{
            margin-top: 20px;
            margin-bottom: 20px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .input_search{
            border-radius: 3px;
            border: 1px solid #F4BF73;
            padding: 1em;
            width: 160px;
        }

        .btn_search{
            background-image: url(/images/icons/search-orange.svg);
            background-repeat: no-repeat;
            background-size: 100%;
            border: 0;
            text-indent: -9999px;
            margin-left: -3em;
        }

        #allergy_header{
            width: 100%;
            height: 12em;
            background-image: url("images/backgrounds/bg_profile.jpg");
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            z-index: -2;
        }

        #allergy_avatar{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #allergy_avatar img{
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

        #allergy_avatar h1 {
            font-size: 1em;
            text-align: center;
        }

        #not_found{
            border-radius: 3px;
            border: 1px solid rgba(220, 20, 60, 0.3);
            padding: 1em;
            font-size: 12px;
            color: black;
            display: none;
            text-align: center;
            width: 160px;
            margin-left: auto;
            margin-right: auto;
        }

        #allergies-form{
            max-width: 740px;
            margin-left: auto;
            margin-right: auto;
        }

        .allergies__container{
            margin-left: -1em;
        }

        .allergy{
            border-radius: 3px;
            display: block;
            float: left;
            margin: 0.3em;
            width: 160px;
            background-color: #F4BF73;
            list-style: none;
            color: white;
        }

        .allergy img{
            display: block;
            width: 50px;
            height: 50px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0.5em;
        }

        .allergy p{
            text-align: center;
        }

        .btn_save{
            display: block;
            border-radius: 3px;
            border: 1px solid #A0D1E6;
            background-color: #A0D1E6;
            padding: 1em;
            width: 160px;
            margin-top: 5em;
            margin-left: auto;
            margin-right: auto;   
            color: white;
        }

        .clearfix{
            content: "";
            clear: both;
        }
    </style>

    <div id="allergies-box">

        <div id="allergy_header">


        </div>

        <div id="allergy_avatar">

            <img src="{{$user->avatar}}" alt="profilepicture" id="avatar">
            <h1>Aan welke soorten voedingsproducten ben je allergisch?</h1>

        </div>

        <div class="search">
            <input id="search" class="input_search" type="text" value="" placeholder="Zoek hier">
            <!--<input id="search_val" type="text" value="" hidden>-->
            <button id="btn_search" class="btn_search" onclick="search()">Zoek</button>
        </div>

        <div id="allergies-form">
            <form method="post" action="{{URL::action('AllergyController@store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <p id="not_found">Geen allergiëen gevonden</p>
                <ul class="allergies__container">
                    @foreach($allergies as $allergy)
                        <label for="{{$allergy->id}}">
                            <li class="allergy"
                                @foreach($user_allergies as $u) 
                                    @if($u->allergy_id == $allergy->id) 
                                        style="background-color: #A0D1E6;" 
                                    @endif
                                @endforeach
                            >
                                <img src="{{$allergy->path}}" alt="allergy_icon" id="allergy_icon">
                                <p>{{$allergy->name}}</p>
                                <input id="{{$allergy->id}}" type="checkbox" value="{{$allergy->id}}" name="allergies[]"
                                    @foreach($user_allergies as $u) 
                                        @if($u->allergy_id == $allergy->id) 
                                       checked
                                        @endif
                                    @endforeach
                                hidden>
                            </li>
                        </label>
                    @endforeach
                </ul>

                <div class="clearfix"></div>
                <button type="submit" id="btn_save" class="btn_save">Klaar!</button>
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

        $("input[type='checkbox']").on("change", function () {
            if ($(this).is(":checked")){
                $("label[for='" + $(this).attr('id') + "'] > li").css("background-color", "#A0D1E6");
                //$("label[for='" + $(this).attr('id') + "'] > li").append("<p style='margin-left: 10px'>&#10004;</p>")
            }else {
                $("label[for='" + $(this).attr('id') + "'] > li").css("background-color", "#F4BF73");
                //$("label[for='" + $(this).attr('id') + "'] > li > p:last-of-type").remove();
            }
        });
    </script>
@endsection