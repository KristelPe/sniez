@extends('master')
@section('content')



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

@endsection