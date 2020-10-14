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

            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    </head>
    <body>
        <center>
            <h1>WELCOME TO NETPIE2020</h1>
            <h3>LED Control : <span id="status" class="connect">Connect...</span></h3>
            <p id="status-led">...</p>
            <button id="led-on" disabled>ON</button>  <button id="led-off" disabled>OFF</button>
        </center> 


        <div class="container">
            <h2 class="mt-5">ตั้งเวลาปั๊มน้ำ</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+ เพิ่มเวลา</button>
          
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">เพิ่มเวลา</h4>
                  </div>
                  <div class="modal-body">
        <form method="post" action="{{url('pump')}}">
          {{csrf_field()}}
          <div class="form-group">
            <select name = "onHour" id="onHour">
              <option value="None">-- ชั่วโมง --</option>
              <option value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
            </select>
          </div>
          :
          <div class="form-group">
            <select name = "onMin" id="onMin">
              <option value="None">-- นาที --</option>
              <option value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>
              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>
              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>
              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="52">52</option>
              <option value="53">53</option>
              <option value="54">54</option>
              <option value="55">55</option>
              <option value="56">56</option>
              <option value="57">57</option>
              <option value="58">58</option>
              <option value="59">59</option>
            </select>
          </div>
          <div class="form-group">
            <select name = "offHour" id="offHour">
              <option value="None">-- ชั่วโมง --</option>
              <option value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
            </select>
          </div>
          :
          <div class="form-group">
            <select name = "offMin" id="offMin">
              <option value="None">-- นาที --</option>
              <option value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>
              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>
              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>
              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="52">52</option>
              <option value="53">53</option>
              <option value="54">54</option>
              <option value="55">55</option>
              <option value="56">56</option>
              <option value="57">57</option>
              <option value="58">58</option>
              <option value="59">59</option>
            </select>
          </div>
        <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-primary "> ตั้งเวลา</button> 
          </div>
        </div>
        </form>
        
        </div>
        
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        
        </div>
        
        </div>
        </div>
        
        </div>
        
            <table class="table">
              <thead class="thread-dark">
                  
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">เวลาเปิด</th>
                      <th scope="col">เวลาปิด</th>
                      <th scope="col"> Action </th>
        
                  </tr>
        
                  @if ($pumps)
                    @foreach ($pumps as $item)
                      <tr>
                      <td> </td>
                      <td>{{$item->onHour}} : {{$item->onMin}}</td>
                      <td>{{$item->offHour}} : {{$item->offMin}}</td>
                  <td>
                        <form action="{{url('pump',[$item->id])}}" method="post">
                            <input type="hidden" name="_method"  value="delete"/>
                            {{csrf_field()}} 
                            <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger " value="ลบ"/>
        
                        </form>
                      </td>
        
                      </tr>
                    @endforeach
                  @endif
        
              </thead>
            </table>


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