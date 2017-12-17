<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
            height: 100vh;
        }
        input, label {
            vertical-align:middle
        }
        .qrcode-text-btn {
            display:inline-block;
            background-color: white;
            border-radius: 50%;
            background-image: url('/images/sniez_strawberry.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 90%;
            height:70vw;
            width:70vw;
            max-height: 50vh;
            max-width: 50vh;
            cursor:pointer;
            box-shadow: 0 0 50px rgba(0,0,0,0.1);
            margin: auto;
        }
        .qrcode-text-btn > input[type=file] {
            position:absolute;
            overflow:hidden;
            width:1px;
            height:1px;
            opacity:0
        }
    </style>

</head>
<body>

<label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1></label>

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
                    window.location.href = res;
                }

            };
            qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);
    }

</script>
</body>
</html>