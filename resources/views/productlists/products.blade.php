@extends('master')

@section('content')

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product/products.css') }}" />

    <!-- PRODUCTSPAGE -->

    <div id="products">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div>
            <div id="products_header"></div>

            <div id="products_avatar">
                <img src="{{$user->avatar}}" alt="{{"$user->name"}}">
            </div>

            <select id="products_dropDown">
                <option class="products_dropDown_select" value="products_saved">Alle producten</option>
                <option class="products_dropDown_select" value="products_all">Bewaarde producten</option>
            </select>

            <div id="products_allergies">
                @foreach($user_allergies as $a)
                    <div class="products_allergy">
                        <img class="removeA" src="images/cancel.png" alt="deleteBtn"> <p>{{$a->allergies->name}}</p>
                    </div>
                @endforeach

                <div id="reset" class="products_allergy">
                    <p>Reset</p>
                </div>

                <div class="search">
                    <input id="search" class="input_search" type="text" placeholder="Zoek hier een product...">
                    <button class="btn_search">Zoek</button>
                </div>
            </div>
            <p id="not_found">Geen producten gevonden</p>
        </div>

        <div id="products_saved" class="drop-down-show-hide">

            @foreach($products as $ap)
                <div class="products_product">
                    <a style="background-image: url('{{$ap->img}}');" href="/product/{{$ap->id}}">
                        <p>{{$ap->titel}}</p>
                    </a>
                </div>
            @endforeach

        </div>


        <div id="products_all" class="drop-down-show-hide">

            <div id="add_products_list">
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
                    <input name="name_list" placeholder="Bv. Zoetigheden, Kerstmis,..." type="text">
                    <input name="img_list" type="text" style="display: none">
                    <button type="submit">Verzenden</button>
                    <a style="text-align: center; color: white; margin-top: 30px;" href="/products">Cancel</a>
                </form>
            </div>

            @foreach($products_lists as $list)
                <div class="products_list">
                    <a href="/list/{{$list->id}}">
                        <div class="img_list"

                             @if($list->img != "")
                             style="background-image: url('{{$list->img}}'); background-size: cover;"
                                @endif

                        ></div>
                        <div class="info_list">
                            <p>{{$list->name}}</p>
                            <span><p style="color: #a3a3a3;">{{$list->listables->count()}} producten</p></span>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>


    </div>

    <!-- JS -->

    <script>

        $('#products_saved').show();
        $('#products_allergies').show();
        $('#products_all').hide();

        $('#products_dropDown').change(function () {
            $('.drop-down-show-hide').hide();
            $('#products_allergies').hide();
            $('#' + this.value).show();

        });

        // POPUP FORM

        $(function() {

            // contact form animations
            $('#add_products_list').click(function() {
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
            $('.products_allergy').show();
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
                url: "{{URL::action('ProductController@getCustomProducts')}}",
                data: {allergies: allergies},
                success: function (response) {
                    $('#products_saved').empty();
                    $.each( response, function( key, value ) {
                        $("#products_saved").append(' <div class="products_product"><a href="/product/'+ value.id +'"><img src="'+ value.img +'" alt="product"> <p>' + value.titel + '</p> </a> </div>');
                    });
                }
            });
        }

        $("#search").keyup(function(e){
            search();
        });

        $("#search").on('input', function(){
            if ($(this).val() == "") {
                $(".products_product").css("display", "block")
            }
        });

        jQuery.expr[':'].contains = function(a, i, m){
            return jQuery(a).text().toLowerCase()
                    .indexOf(m[3].toLowerCase()) >= 0;
        };

        function search() {
            var search = $("#search").val();
            if (search == "") {
                $(".products_product").css("display", "block");
            } else {
                $(".products_product").css("display", "none");
                $(".products_product > a > p:contains("+search+")").parent().parent().css("display", "block");
            }

            if ($(".products_product").is(":visible")) {
                $("#not_found").css("display", "none");
            } else {
                $("#not_found").css("display", "block");

            }
        }

    </script>





@endsection