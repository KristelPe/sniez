@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/recipe/recipe.css') }}" />

    <style>

        #recipe_header {

            width: 100%;
            height: 12em;
            background-image: url("{{$recipe->img}}");
            background-size: cover;
            background-repeat: no-repeat;

            z-index: -2;
        }


    </style>

    <!-- RECIPEPAGE -->

    <div id="recipe">

        <div id="recipe_header">

        </div>



        <div id="recipe_head">

            <div id="recipe_title">

                <h1>{{$recipe->titel}}</h1>
                <p>Geschikt voor {{$recipe->personen}} personen</p>

            </div>

            <div id="recipe_save" onclick="openList()">

                <button>+</button>
                <p>Voeg toe aan één van je lijstjes.</p>

            </div>

            <div id="recipe_save_dropdown">

                <h3>Kies een lijstje waar je recept zal worden bewaard.</h3>
                <div id="recipe_save_lists">

                    @foreach($recipe_lists as $l)

                        <a onclick="location.href='/recipe/'+ {{$recipe->id}} +'/addToList/{{$l->id}}'"><p style="background-image: url({{$l->img}}); background-size: cover";>{{$l->name}}</p></a>

                    @endforeach

                </div>

                <a style="text-decoration: none;" href="/recipe/{{$recipe->id}}"><p style="text-align: center;font-size: 0.8em; margin-top: 40px; color: white;">Ik doe dit later wel.</p></a>
                
                <a class="new_list" href="/recipes">Maak een nieuwe lijst</a>

            </div>

        </div>

        <div id="recipe_avatar">

            <img src="{{$user->avatar}}" alt="{{"$user->name"}}">

        </div>


        @if(Session::has('message'))
            <p class="{{ Session::get('class') }}">{{ Session::get('message') }}</p>
        @endif

        <div id="recipe_content">

            <div id="recipe_ingredients">

                <h2 class="recipe_content_title">Ingrediënten</h2>

                <p>{{$recipe->ingredienten}}</p>

            </div>

            <div id="recipe_preparation">

                <h2 class="recipe_content_title">Werkwijze</h2>

                <p>{{$recipe->bereiding}}</p>

            </div>

        </div>

        <div id="libelle_logo">
            <p>Recept mogelijk gemaakt door:</p>
            <img src="/images/libelle-lekker.png" alt="libellelogo">

        </div>

        <div id="recipe_footer">

            <a href="/recipes"><img src="/images/nav/left-arrow.png" alt="back"><p>Ga terug</p></a>


        </div>


    </div>

    <script>

    // POPUP FORM

    $(function() {

    // contact form animations
    $('#recipe_save').click(function() {
    $('#recipe_save_dropdown').fadeToggle();
    })
    $(document).mouseup(function (e) {
    var container = $("#recipe_save_dropdown");

    if (!container.is(e.target)
    && container.has(e.target).length === 0)
    {
    container.fadeOut();
    }
    });

    });

    </script>

@endsection