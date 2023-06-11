<!DOCTYPE html>
<html>

<head>
    <title>Mini Proyecto de Escáner PHP</title>
    <!-- Agrega aquí tus enlaces a archivos CSS o librerías externas si es necesario -->
    <script src="{{ asset('assets/ht.js') }}"></script>
    <style>
        .result {
            background-color: green;
            color: #fff;
            padding: 20px;
        }

        .row {
            display: flex;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col">
            <div style="width:500px;" id="reader"></div>
        </div>
        <audio id="myAudio1">
            <source src="{{ asset('assets/success.mp3') }}" type="audio/ogg">
        </audio>
        <audio id="myAudio2">
            <source src="{{ asset('assets/failes.mp3') }}" type="audio/ogg">
        </audio>
        <script>
            var x = document.getElementById("myAudio1");
            var x2 = document.getElementById("myAudio2");
            var html5QrcodeScanner;

            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "{{ asset('assets/gethint.php') }}?q=" + str, true);
                    xmlhttp.send();
                }
            }

            function playAudio() {
                x.play();
            }

            function onScanSuccess(qrCodeMessage) {
                document.getElementById("result").value = qrCodeMessage;
                showHint(qrCodeMessage);
                playAudio();
            }

            function onScanError(errorMessage) {
                // Manejar el error de escaneo
            }

            document.addEventListener("DOMContentLoaded", function() {
                html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", {
                        fps: 10,
                        qrbox: 250
                    }
                );

                html5QrcodeScanner.render(onScanSuccess, onScanError);
            });
        </script>
        <div class="col" style="padding:30px;">
            <h4>Resultados del escaner</h4>
            <div>Información de QR</div>
            <form action="">
                <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)"
                    readonly="">
            </form>
            <p>Estado: <span id="txtHint"></span></p>
        </div>
    </div>
</body>

</html>
