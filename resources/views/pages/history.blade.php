<!DOCTYPE html>
<html lang="en">
<head>
  <title>HISTORY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Project</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/pump/create">Pump</a></li>
        <li><a href="/light/create">Grow light</a></li>
        <li><a href="/task/create">Memo</a></li>
        <li ><a href="/quest/create">Farmer Book</a></li>
        <li class="active"><a href="/history">History</a></li>
      </ul>
    </div>
  </nav>
<body>
<div class="container">
  <h2>HISTORY</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">ประวัติทั้งหมด</a></li>
    <li><a data-toggle="tab" href="#menu1">ประวัติการเปิดปิดปั๊มน้ำ</a></li>
    <li><a data-toggle="tab" href="#menu2">ประวัติการเปิดปิดหลอดไฟ Grow light</a></li>
    <li><a data-toggle="tab" href="#menu3">ประวัติการปลูกผัก</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>ประวัติทั้งหมด</h3>
      <table class="table">
        <tr>
        <th scope="col">วันที่</th>
        <th scope="col">event</th>
        <th scope="col">สถานะ</th>
        </tr>
        
        @foreach ($list as $item)
        <tr>
              <td>{{$item->created_at}}</td>
              <td>{{$item->event}}</td>
              <td>{{$item->status}}</td>
            
        </tr>
        @endforeach
      </table>
      
    </div>

    <div id="menu1" class="tab-pane fade">
      <h3>ปั๊มน้ำ</h3>
      <table class="table">
        <tr>
        <th scope="col">วันที่</th>
        <th scope="col">event</th>
        <th scope="col">สถานะ</th>

        </tr>
 
        @foreach ($list as $item)
        @if ($item->event == "PUMP")
            <tr>
              <td>{{$item->created_at}}</td>
              <td>{{$item->event}}</td>
              <td>{{$item->status}}</td>
            </tr>
        @endif
        @endforeach

      </table>
    </div>

    <div id="menu2" class="tab-pane fade">
      <h3>หลอดไฟ Grow light</h3>
      <table class="table">
        <tr>
        <th scope="col">วันที่</th>
        <th scope="col">event</th>
        <th scope="col">สถานะ</th>

        </tr>
 
        @foreach ($list as $item)
        @if ($item->event == "grow light")
            <tr>
              <td>{{$item->created_at}}</td>
              <td>{{$item->event}}</td>
              <td>{{$item->status}}</td>
            </tr>
        @endif
        @endforeach

      </table>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>ปลูกผัก</h3>
      <table class="table">
        <tr>
        <th scope="col">วันที่</th>
        <th scope="col">ชื่อผัก</th>
        <th scope="col">สถานะ</th>
        </tr>
 
        @foreach ($list as $item)
        @if ($item->event != "grow light" && $item->event != "PUMP")
            <tr>
              <td>{{$item->created_at}}</td>
              <td>{{$item->event}}</td>
              <td>{{$item->status}}</td>
            </tr>
        @endif
        @endforeach

      </table>
    </div>
    
  </div>
</div>

</body>
</html>