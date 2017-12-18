<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$item->product}}</title>
    <style>
        body {
            font-family: 'Lato', sans-serif;
            background-color: rgba(255, 164, 178, 0.18);
        }
        header {
            height: 20vh;
            background-image: url("/images/Cta_mobile.png");
            background-position: center;
            background-size: cover;
        }
        #product {
            display: flex;
            flex-direction: column;
            width: 80%;
            margin-left: 10%;
            margin-top: 50px;
        }
        #product h2 {
            color: #f3be7d;
            font-size: 0.8em;
        }
        #product h4 {
            color: #f3be7d;
            font-size: 1.8em;
            text-align: center;
            margin-top: 50px;
        }
        .product_info {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: white;
            border-radius: 10px;
            padding: 20px 0;
            margin-top: 10px;
        }
        .product_info img {
            max-width: 300px;
            max-height: 300px;
            margin: auto;
            margin-left: 3em;
        }
        .product_title {
            margin-right: 10%;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
        .product_title h3, h5 {
            color: #ff667d;
            font-size: 1.2em;
            text-align: end;
        }
        .product_title p, li {
            color: darkgrey;
            font-size: 0.6em;
            text-align: end;
            text-transform: uppercase;
            margin-top: 10px;
        }
        .product_safety {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            margin-top: 20px;
        }
        #safety {
            width: 20px;
            height: 20px;
            border-radius: 100%;
            background-color: rgba(255, 162, 11, 0.76);
        }
        .safety_title {
            color: rgba(255, 162, 11, 0.76);
            margin-left: 15px;
            font-size: 0.8em;
            align-self: center;
        }
        .danger{
            font-weight: bold;
            color: rgba(255, 162, 11, 0.76);
        }
        ul{
            list-style-type: none;
        }
        h5{
            color: rgba(255, 162, 11, 0.76);
            font-size: 1em;
            margin-bottom: -0.5em;
        }
    </style>
</head>
<body>

<header></header>

<?php $allergy = "noten" ?>


<div id="product">

    <h2>Gescand product :</h2>
    <div class="product_info">

        <img src="{{$item->img}}" alt="{{$item->product}}">

        <div class="product_title">

            <h3>{{$item->product}}</h3>
            <p>{{$item->specs->brand}}</p>
            <p>{{$item->specs->volume}}</p>

            <h5>Ingrediënten</h5>
            <ul>
                @foreach($item->ingredients as $i)
                    @if(strpos($i, $allergy) !== false)
                        <li class="danger">{{$i}}</li>
                        <?php $danger = true ?>
                    @else
                        <li>{{$i}}</li>
                    @endif
                @endforeach
            </ul>
            @if($danger == true)
            <div class="product_safety">
                <div id="safety"></div>
                <div class="safety_title">Pas op!</div>
            </div>
            @endif

        </div>

    </div>

    @if($danger == true)
        <h4>Er zitten {{$allergy}} in dit product.</h4>
    @endif

</div>

</body>
</html>