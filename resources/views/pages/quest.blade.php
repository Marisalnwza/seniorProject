{{-- @extends('master')
@section('title','สมุดนักปลูกผัก')
@section('content') --}}

<html lang="en">
<head>
  <title>สมุดนักปลูกผัก</title>
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
        <li class="active"><a href="/quest/create">Farmer Book</a></li>
        <li><a href="/history">History</a></li>
      </ul>
    </div>
  </nav>

<body>
<h2>สมุดนักปลูกผัก</h2>    
<div class="panel panel-default">
  <div class="panel-body">
    <h4>user : {{$user[0]->username}}</br>
Score : {{$user[0]->score}}</br>
Rank : {{$user[0]->rankname}}</h4>
<div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">คู่มือนักปลูกผัก</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">คู่มือ</h4>
          </div>
          <div class="modal-body">
            <p>สะสมครบ 200 ท่านจะได้เลื่อนขั้นเป็น นักปลูกผักระดับ D <br>
                สะสมครบ 600 ท่านจะได้เลื่อนขั้นเป็น นักปลูกผักระดับ C <br>
                สะสมครบ 1400 ท่านจะได้เลื่อนขั้นเป็น นักปลูกผักระดับ B <br>
                สะสมครบ 2000 ท่านจะได้เลื่อนขั้นเป็น นักปลูกผักระดับ A <br>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    
</div>
  </div>
</div>




<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">ทั้งหมด</a></li>
  <li><a data-toggle="tab" href="#menu2">ภารกิจที่สำเร็จ</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>ภารกิจทั้งหมด</h3>
    <table class="table">
      <thead class="thread-dark">
          
          <tr>
              <th scope="col"><center>ภารกิจที่</center></th>
              <th scope="col"><center>ภารกิจ</center></th>
              <th scope="col"><center>คะแนนภารกิจ</center></th>
              <th scope="col"><center>สถานะภารกิจ</center></th>
              <th scope="col"><center></center></th>
          </tr>

          @for ($i = 0; $i < count($list); $i++)
          <tr>
              <td><center>{{$i+1}}</center></td>
              <td><dt>{{$list[$i]->questname}}</dt></br>
                  <p class="text-muted">{{$list[$i]->info}}</p></td>
              <td><center>{{$list[$i]->point}}</center></td>
              
              @if ($list[$i]->category =="เริ่มปลูก")
              
                  @if ($list[$i]->statusQuest =="clear"||$list[$i]->statusQuest =="completed")
                      <td><center>{{$list[$i]->statusQuest}}</center></td>
                  @else
                      <td><center>{{count($count1)}}/{{$list[$i]->value}}</center></td>
                  @endif 

              @elseif($list[$i]->category =="เก็บเกี่ยว")
                  @if ($list[$i]->statusQuest =="clear"||$list[$i]->statusQuest =="completed")
                      <td><center>{{$list[$i]->statusQuest}}</center></td>
                  @else
                      <td><center>{{count($count2)}}/{{$list[$i]->value}}</center></td>
                  @endif 

              @elseif($list[$i]->category =="ละทิ้ง")
                  @if ($list[$i]->statusQuest =="clear"||$list[$i]->statusQuest =="completed")
                  <td><center>{{$list[$i]->statusQuest}}</center></td>
                  @else
                      <td><center>{{count($count3)}}/{{$list[$i]->value}}</center></td>
                  @endif 

              @endif

              <td><center>
              @if($list[$i]->statusQuest == "clear")
              
              
                  <form action="{{url('quest',[$list[$i]->id])}}" method="post">
                      <input type="hidden" name="_method"  value="PUT"/>
                      {{csrf_field()}} 
                      <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                      {{-- <input type="submit" class="btn btn-danger " value="ลบ"/> --}}

                      <button type="submit" class= btn btn-success"> รับคะแนน </button>  
  
                  </form>
              @endif       
              </center></td>
              



          </tr>   
          @endfor

      </tbody>
  </table>
    
  </div>
 
  <div id="menu2" class="tab-pane fade">
    <h3>ภารกิจที่สำเร็จแล้ว</h3>
    <table class="table">
      <thead class="thread-dark">
          
          <tr>
              <th scope="col"><center>ภารกิจที่</center></th>
              <th scope="col"><center>ภารกิจ</center></th>
              <th scope="col"><center>คะแนนภารกิจ</center></th>
              <th scope="col"><center>สถานะภารกิจ</center></th>
              <th scope="col"><center></center></th>
          </tr>
          
          @php
                    $i1=0;   
            @endphp
          @foreach ($list as $item)
          @if ($item->statusQuest == "completed")
          @php
                    $i1++;   
            @endphp

          <tr>
          <td><center>{{$i1}}</center></td>
                <td><dt>{{$item->questname}}</dt></br>
                    <p class="text-muted">{{$item->info}}</p></td>
                <td><center>{{$item->point}}</center></td>
                <td><center>{{$item->statusQuest}}</center></td>
              </tr>

              
          @endif
              
          @endforeach

      </tbody>
  </table>
  </div>
  
</div>

    




</body>