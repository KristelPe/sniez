@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/recipe/recipes.css') }}" />

    <!-- RECIPESPAGE -->


    <div id="recipes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div>
            <div id="recipes_header"></div>

            <div id="recipes_avatar">
                <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
            </div>

            <select id="recipes_dropDown">
                <option class="recipes_dropDown_select" value="recipes_saved">Alle recepten</option>
                <option class="recipes_dropDown_select" value="recipes_all">Bewaarde recepten</option>
            </select>

            <div id="recipes_allergies">
                @foreach($user_allergies as $a)
                    <div class="recipes_allergy">
                        <img class="removeA" src="images/cancel.png" alt="deleteBtn"> <p>{{$a->allergies->name}}</p>
                    </div>
                @endforeach

                <div id="reset" class="recipes_allergy">
                   <p>Reset</p>
                </div>

                <div class="search">
                    <input id="search" class="input_search" type="text" placeholder="Zoek hier een recept...">
                    <button class="btn_search">Zoek</button>
                </div>
            </div>
            <p id="not_found">Geen recepten gevonden</p>
        </div>

        <div id="recipes_saved" class="drop-down-show-hide">

            @foreach($recipes as $r)
                <div class="recipes_recipe">
                    <a style="background-image:url('{{$r->img}}');" href="/recipe/{{$r->id}}">
                        <p>{{$r->titel}}</p>
                    </a>
                </div>
            @endforeach

        </div>


        <div id="recipes_all" class="drop-down-show-hide">
            <div id="add_recipes_list">
                <a href="#">
                    <img src="images/add.png" alt="add_list">
                    <div id="text_add">
                        <p>Voeg een nieuwe lijst toe</p>
                    </div>
                </a>
            </div>

            <div id="add_list_form">
                <form action="" method="POST">

                    <h3>Vul hier de naam in van je lijstje</h3>
                    {{ csrf_field() }}
                    <input name="name_list" placeholder="Bv. Pasta, Koekjes,..." type="text">
                    <input name="img_list" type="text" style="display: none">
                    <button type="submit">Verzenden</button>
                    <a style="text-align: center; color: white; margin-top: 30px;" href="/recipes">Cancel</a>
                </form>
            </div>

            @foreach($recipe_lists as $list)
                <div class="recipes_list">
                    <a href="/list/{{$list->id}}">
                        <div

                                @if($list->img != "")
                                style="background-image: url('{{$list->img}}'); background-size: cover;"
                                @endif

                                class="img_list"></div>
                        <div class="info_list">
                            <p>{{$list->name}}</p>
                            <span><p style="color: #a3a3a3;">{{$list->listables->count()}} recepten</p></span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

    <script>

        $('#recipes_allergies').show();
        $('#recipes_saved').show();
        $('#recipes_all').hide();


        $('#recipes_dropDown').change(function () {
            $('.drop-down-show-hide').hide();
            $('#recipes_allergies').hide();
            $('#' + this.value).show();
        });

        // POPUP FORM

        $(function() {

            // contact form animations
            $('#add_recipes_list').click(function() {
                $('#add_list_form').fadeToggle();
            })
            $(document).mouseup(function (e) {
                var container = $("#add_list_form");

                if (!container.is(e.target)
                    && container.has(e.target).length === 0)
                {
                    container.fadeOut();
                }
            });

        });


        $(".removeA").on("click", function () { 
            $(this).parent().hide(); 
            updateList();
        });

        $('#reset').on("click", function(){
            $('.recipes_allergy').show();
            updateList();
        });

        function updateList(){
            var allergies = [];

            $(".removeA:visible").siblings().each(function( i ) {
                allergies.push(this.innerHTML);
            });

            $.ajaxSetup({
                headers:  { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                type: 'post',
                url: "{{URL::action('RecipeController@getCustomRecipes')}}",
                data: {allergies: allergies},
                success: function (response) {
                    $('#recipes_saved').empty();
                    $.each( response, function( key, value ) {
                        $("#recipes_saved").append(' <div class="recipes_recipe"><a href="/recipe/'+ value.id +'"><img src="'+ value.img +'" alt="recipe"> <p>' + value.titel + '</p> </a> </div>');
                    });
                }
            });
        }

        $("#search").keyup(function(e){
            search();
        });

        $("#search").on('input', function(){
           if ($(this).val() == "") {
               $(".recipes_recipe").css("display", "block")
           }
        });

        jQuery.expr[':'].contains = function(a, i, m){
            return jQuery(a).text().toLowerCase()
                .indexOf(m[3].toLowerCase()) >= 0;
        };

        function search() {
          var search = $("#search").val();
          if (search == "") {
              $(".recipes_recipe").css("display", "block");
          } else {
              $(".recipes_recipe").css("display", "none");
              $(".recipes_recipe > a > p:contains("+search+")").parent().parent().css("display", "block");
          }

          if ($(".recipes_recipe").is(":visible")) {
              $("#not_found").css("display", "none");
          } else {
              $("#not_found").css("display", "block");

          }
        }

    </script>



@endsection