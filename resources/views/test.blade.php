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
            background-image: url("../../landingspagina/images/desktop/header_desktop.png");
            background-position: center;
            background-size: cover;
        }
        
        input, label {
            vertical-align:middle
        }
        .qrcode-text-btn {display:inline-block;
            background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat;
            height:50vh;
            width:50vw;
            cursor:pointer}
        .qrcode-text-btn > input[type=file] {
            position:absolute;
            overflow:hidden;
            width:1px;
            height:1px;
            opacity:0}

        label{
            height: 50vh;
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