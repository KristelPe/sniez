@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product/product.css') }}" />

    <!-- PRODUCTPAGE -->

    <div id="scanned">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div>
            <div id="scanned_header"></div>

            <div id="scanned_avatar">
                <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
            </div>

        </div>


        <div id="scanned_warning">

            @if($alerts == null)

            <p class="scanned_warning_green">Dit product is veilig voor je.</p>

            @else

                <p  class="scanned_warning_red">Let op dit product bevat:
                    @foreach($alerts as $key => $a)
                        @if (count($alerts) == ($key+1))
                            {{$a}}
                        @else
                            {{$a}},
                        @endif
                    @endforeach
                </p>

            @endif

        </div>

        <div id="scanned_product">

            <div id="scanned_product_info">
            <img src="{{$product->img}}" alt="scanned product">
            <p>{{$product->titel}}</p>
            </div>

            <div id="product_save">

                <button>+</button>
                <p>Voeg toe aan één van je lijstjes</p>

            </div>
        </div>

        <div id="product_save_dropdown">

            <h3>Kies een lijstje waar je recept zal worden bewaard.</h3>
            <div id="product_save_lists">

                @foreach($products_lists as $l)

                    <a onclick="location.href='/product/'+ {{$product->id}} +'/addToList/{{$l->id}}'"><p  style="background-image: url({{$l->img}})";>{{$l->name}}</p></a>

                @endforeach

            </div>

            <a style="text-decoration: none;" href="/product/{{$product->id}}"><p style="text-align: center;font-size: 0.8em; margin-top: 40px; color: white;">Ik doe dit later wel.</p></a>
            <a class="new_list" href="/products">Maak een nieuwe lijst</a>


        </div>

        <h1>Voorgestelde recepten:</h1>

        <div id="scanned_proposals">



            @foreach($all_recipes as $r)
                <div class="recipes_recipe">
                    <a style="background-image:url('{{$r->img}}');" href="/recipe/{{$r->id}}">
                        <p>{{$r->titel}}</p>
                    </a>
                </div>
            @endforeach
            
            


        </div>

    </div>

    <!-- JS -->

    <script>

        // POPUP FORM

        $(function() {

            // contact form animations
            $('#product_save').click(function() {
                $('#product_save_dropdown').fadeToggle();
            })
            $(document).mouseup(function (e) {
                var container = $("#product_save_dropdown");

                if (!container.is(e.target)
                    && container.has(e.target).length === 0)
                {
                    container.fadeOut();
                }
            });

        });

    </script>

@endsection