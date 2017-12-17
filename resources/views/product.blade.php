<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$item->product}}</h1>
    <img src="{{$item->img}}" alt="{{$item->product}}">
    <h2>Specs</h2>
    <ul>
        <li><b>Brand:</b> {{$item->specs->brand}}</li>
        <li><b>Volume:</b> {{$item->specs->volume}}</li>
    </ul>
    <br>
    <h2>Ingredients</h2>
    @foreach($item->ingredients as $i)
        <ul>
            <li>{{$i}}</li>
        </ul>
    @endforeach
</body>
</html>