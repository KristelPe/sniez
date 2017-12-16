<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QrCode</title>
    <style>
    </style>
</head>
<body>

    <form action="{{ action('QrController@index') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="qr" type="file" accept="image/*" capture="camera">
        <button>send</button>
    </form>

</body>
</html>