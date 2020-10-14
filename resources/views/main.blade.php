<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

<title>NETPIE2020</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
<script type="text/javascript" src="Example.js"></script>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Project
                </div>
                
                <center>
                    <h3 id="show">show data</h3>
                </center>
                
                <div class="links">
                  <a href="/pump/create">เปิด/ปิด ปั๊มน้ำ</a><br>
                  <a href="/light/create">เปิด/ปิด หลอดไฟ Grow Light</a><br>
                  <a href="/task/create">นับวันปลูกผัก</a><br>
                  <a href="/farmer">สมุดนักปลูกผัก</a><br>
                  <a href="/history">ดูประวัติ</a><br>
                  <a href="/setting">ตั้งค่า</a><br>
                </div>
            </div>
        </div>
    </body>
    <script>
        client = new Paho.MQTT.Client("mqtt.netpie.io", 443, "6e5592bc-1515-4ed3-931a-62a44bb4da67");
        client.onMessageArrived = onMessageArrived;
        
        var options = {
          useSSL: true,
          userName: "ughPxmu4wVzZf3VqcNTKLVs8sNx8iCkw",
          password: "#d*e#enAWdbrx0a3lLU1fZ-c2(rDiNCK",  
          onSuccess: onConnect,
          onFailure:doFail,
        }
        
        client.connect(options);
        
        function onConnect() {
          client.subscribe("@msg/ecph");
        }
        
        function doFail(e){
            console.log(e);
          }
        
        function onMessageArrived(message) {
          document.getElementById("show").innerHTML = message.payloadString;
        }
        </script>
</html>

