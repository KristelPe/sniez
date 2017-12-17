<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QrCode</title>
    <style>
        body, input {
            font-size:14pt
        }
        body{
            background-color: #f3be7d;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100vw;
            height: 80vh;
        }
        input, label {
            vertical-align:middle
        }
        form{
            height:70vw;
            width:70vw;
            max-height: 50vh;
            max-width: 50vh;
            margin: auto;
            text-align: center;
        }
        .qrcode-text-btn {
            display:inline-block;
            background-color: white;
            border-radius: 50%;
            background-image: url('/images/sniez.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 65%;
            height:70vw;
            width:70vw;
            max-height: 50vh;
            max-width: 50vh;
            cursor:pointer;
            box-shadow: 0 0 25px rgba(0,0,0,0.3);
            margin: auto;
        }
        .qrcode-text-btn > input[type=file] {
            position:absolute;
            overflow:hidden;
            width:1px;
            height:1px;
            opacity:0
        }

        img{
            margin-top: calc(70vw - 2.3em);
            height: 1.5em;
        }
    </style>
</head>
<body>

    <form action="{{ action('QrController@index') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label class=qrcode-text-btn>
            <input name="qr" type=file accept="image/*" capture="camera" onchange="submit()" tabindex=-1>
            <img src="/images/sniez_strawberry.png" alt="sniez">
        </label>
    </form>
</body>
</html>