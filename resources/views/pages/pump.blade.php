<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>NETPIE2020</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
        <script type="text/javascript" src="Example.js"></script>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
            #status {
                background: #333;
                color: #FFF;
                border-radius: 3px;
                font-weight: bold;
                padding: 3px 6px;
            }
            #status.connect {
                background: #E18C1A;
                color: #FFF;
            }
            #status.connected {
                background: #00AE04;
                color: #FFF;
            }
            #status.error {
                background: #F00;
                color: #FFF;
            }
            button {
                font-size: 32px;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>WELCOME TO NETPIE2020</h1>
            <h3>LED Control : <span id="status" class="connect">Connect...</span></h3>
            <p id="status-led">...</p>
            <button id="led-on" disabled>ON</button>nbsp;nbsp;nbsp;<button id="led-off" disabled>OFF</button>
        </center>
    </body>
<script>
$(document).ready(function(e) {
    client = new Paho.MQTT.Client("mqtt.netpie.io", 443, "6e5592bc-1515-4ed3-931a-62a44bb4da67");
    var options = {
        useSSL: true,
        userName: "ughPxmu4wVzZf3VqcNTKLVs8sNx8iCkw",
        password: "#d*e#enAWdbrx0a3lLU1fZ-c2(rDiNCK",
        onSuccess:onConnect,
        onFailure:doFail
    }
    client.connect(options);

    function onConnect() {
        $("#status").text("Connected").removeClass().addClass("connected");
        client.subscribe("@msg/led");
        mqttSend("@msg/led", "GET");
    }

    function doFail(e){
        console.log(e);
    }

    client.onMessageArrived = function(message) {
        if (message.payloadString == "LEDON" || message.payloadString == "LEDOFF") {
            $("#led-on").attr("disabled", (message.payloadString == "LEDON" ? true : false));
            $("#led-off").attr("disabled", (message.payloadString == "LEDOFF" ? true : false));
        }
    }
    
    $("#led-on").click(function(e) {
        mqttSend("@msg/led", "LEDON");
        document.getElementById("status-led").innerHTML = "LED is ON";
    });
        
    $("#led-off").click(function(e) {
        mqttSend("@msg/led", "LEDOFF");
        document.getElementById("status-led").innerHTML = "LED is OFF";
    });
});
var mqttSend = function(topic, msg) {
    var message = new Paho.MQTT.Message(msg);
    message.destinationName = topic;
    client.send(message);
}
</script>
</html>