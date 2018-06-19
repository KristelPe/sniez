@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login/allergy.css') }}" />


    <!-- ALLERGY -->

    <div id="allergies-box">

        <div id="allergy_header">


        </div>

        <div id="allergy_avatar">

            <img src="{{$user->avatar}}" alt="profilepicture" id="avatar">
            <h1>Selecteer je allergieën en sla ze daarna op!</h1>

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
                        <label class="labels" for="{{$allergy->id}}">
                            <li class="allergy"
                                @if(count($user_allergies) == 0)
                                    @if($allergy->id == 1)
                                        style="background-color: #A0D1E6;" 
                                    @endif
                                @endif
                                @foreach($user_allergies as $key => $u) 
                                    @if($u->allergy_id == $allergy->id) 
                                        style="background-color: #A0D1E6;" 
                                    @endif
                                @endforeach
                            >
                                <img src="{{$allergy->path}}" alt="allergy_icon" id="allergy_icon">
                                <p>{{$allergy->name}}</p>
                                <input id="{{$allergy->id}}" type="checkbox" value="{{$allergy->id}}" name="allergies[]"
                                    @if(count($user_allergies) == 0)
                                        @if($allergy->id == 1)
                                            checked
                                        @endif
                                    @endif
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



    <!-- JS -->

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

        $("#search").keyup(function(e) {
            //if(e.which == 13) {
                search();
            //}
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

            if ($(this).attr('id') != 1) {
                $("label[for='1'] > li").css("background-color", "#F4BF73");
                $("#1").prop("checked", false);
            }
            if($(this).attr('id') == 1) {
                $('.labels > li').css("background-color", "#F4BF73");
                $("input[type='checkbox']").prop("checked", false);
                $("label[for='1'] > li").css("background-color", "#A0D1E6");
                $("#1").prop("checked", true);
            }

        });
    </script>
@endsection