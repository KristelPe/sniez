<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Qr</title>
    <link rel="stylesheet" href="css/reset.css">
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
            margin-top: calc(70vw - 5.5em);
            height: 4em;
        }
    </style>
</head>
<body>

    <form id="qr" action="{{ action('QrController@test') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label class=qrcode-text-btn>
            <input name="qr" type=file accept="image/*" capture="camera" onchange="openQRCamera(this);" tabindex=-1>
            <img src="/images/sniez_strawberry.png" alt="sniez">
        </label>
        <input id="data" name="data" type="text" hidden>
    </form>

<script src='https://dmla.github.io/jsqrcode/src/qr_packed.js'></script>
<script>
    function openQRCamera(node) {
        var reader = new FileReader();
        reader.onload = function() {
            node.value = "";
            qrcode.callback = function(res) {
                if(res instanceof Error) {
                    alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
                } else {
                    //node.parentNode.previousElementSibling.value = res;
                    //window.location.href = res;
                    //alert(res);
                    document.getElementById('data').value = res;
                    document.getElementById("qr").submit();
                }
            };
            qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);

    }

</script>
</body>
</html>