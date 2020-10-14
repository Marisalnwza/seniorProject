@extends('master')
@section('title','นับวันปลูก')
@section('content')


{{-- <html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> --}}


<body>
    <table class="table">
        <thead class="thread-dark">
            
            <tr>
                <th scope="col">หลุมปลูกที่</th>
                <th scope="col">ชื่อผัก</th>
                <th scope="col">เริ่มปลูก</th>
                <th scope="col">วันที่เริ่มปลูก</th>
                <th scope="col">จำนวนวันที่ปลูก</th>
                <th scope="col">เก็บเกี่ยว</th>
                <th scope="col">ทิ้ง</th>
            </tr>

    

            @php
                $i1=0;
            @endphp

                @if($list)
                @foreach ($list as $item)
                @if( $item->hold == "1" && $item->dropped == NULL && $item->harvest == NULL)
                    <tr>
                        @php
                         $i1=1;   
                        @endphp
                        <td>{{$item->hold}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at->toFormattedDateString()}}</td>

                        <td>
                            <?php
 
                            echo  $item->created_at->diffInDays($from);
                            
                            ?>
                        </td>
                        
                        
                        <td>
                        <form action="{{url('task',[$item->id])}}" method="post">
                            <input type="hidden" name="_method"  value="PUT"/>
                            {{csrf_field()}} 
                            <div class="form-group">
                                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                                <input type="hidden" name="name" value = "{{$item->name}}" />
                                <input type="hidden" name="status" value = "{{$item->status}}" />
                                <input type="hidden" name="dropped" value = "" />
                                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
                            </div>
                        </form>
                        </td>

                        <td>
                            <form action="{{url('task',[$item->id])}}" method="post">
                                <input type="hidden" name="_method"  value="PUT"/>
                                {{csrf_field()}} 
                                <div class="form-group">
                                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                                    <input type="hidden" name="name" value = "{{$item->name}}" />
                                    <input type="hidden" name="status" value = "{{$item->status}}" />
                                    <input type="hidden" name="harvest" value = "NULL" />
                                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                                </div>
                            </form>
                        </td>
                        @else
                            
                        @endif
                    </tr>
                @endforeach
                @endif




                
            </thead>
            <tbody>
    
                <!--หลุมปลูกที่1><-->
                @if($i1==0)
                    <tr>
                        
                        <form method="post" action="{{url('task')}}">
                            {{csrf_field()}} 

                        <td>
                        <p>1</p>    
                        <input type="hidden" name="hold" value="1" </input>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="name" id="name">
                                <option value="">เลือกชื่อผัก</option>
                                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                                <option value="กรีนคอส">กรีนคอส</option>
                                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                                <option value="กวางตุ้ง">กวางตุ้ง</option>
                                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                                <option value="เรดคลอรัล">เรดคลอรัล</option>
                                <option value="เรดคอส">เรดคอส</option>
                                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                                
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
                            </div>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                            
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="hidden" name="harvest" value = NULL />
                                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="hidden" name="dropped" value = NULL />
                                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
                            </div>
                        </td>
                    </form>
    
                    </tr>
            
                @endif



{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่2 --}}

                @php
                $i2=0;
            @endphp

                @if($list)
                @foreach ($list as $item)
                @if( $item->hold =="2" && $item->dropped == NULL && $item->harvest == NULL)
                    <tr>
                        @php
                         $i2=1;   
                        @endphp
                        <td>{{$item->hold}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at->toFormattedDateString()}}</td>

                        <td>
                            <?php
 
                            echo  $item->created_at->diffInDays($from);
                            
                            ?>
                        </td>
                        
                        
                        <td>
                        <form action="{{url('task',[$item->id])}}" method="post">
                            <input type="hidden" name="_method"  value="PUT"/>
                            {{csrf_field()}} 
                            <div class="form-group">
                                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                                <input type="hidden" name="name" value = "{{$item->name}}" />
                                <input type="hidden" name="status" value = "{{$item->status}}" />
                                <input type="hidden" name="dropped" value = "" />
                                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
                            </div>
                        </form>
                        </td>

                        <td>
                            <form action="{{url('task',[$item->id])}}" method="post">
                                <input type="hidden" name="_method"  value="PUT"/>
                                {{csrf_field()}} 
                                <div class="form-group">
                                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                                    <input type="hidden" name="name" value = "{{$item->name}}" />
                                    <input type="hidden" name="status" value = "{{$item->status}}" />
                                    <input type="hidden" name="harvest" value = "NULL" />
                                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                                </div>
                            </form>
                        </td>
                        @else
                            
                        @endif
                    </tr>
                @endforeach
                @endif




                
            </thead>
            <tbody>
    
                <!--หลุมปลูกที่2><-->
                @if($i2==0)
                    <tr>
                        
                        <form method="post" action="{{url('task')}}">
                            {{csrf_field()}} 

                        <td>
                        <p>2</p>    
                        <input type="hidden" name="hold" value="2" </input>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="name" id="name">
                                <option value="">เลือกชื่อผัก</option>
                                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                                <option value="กรีนคอส">กรีนคอส</option>
                                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                                <option value="กวางตุ้ง">กวางตุ้ง</option>
                                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                                <option value="เรดคลอรัล">เรดคลอรัล</option>
                                <option value="เรดคอส">เรดคอส</option>
                                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                                
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
                            </div>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                            
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="hidden" name="harvest" value = NULL />
                                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="hidden" name="dropped" value = NULL />
                                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
                            </div>
                        </td>
                    </form>
    
                    </tr>
            
                @endif


                {{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่3 --}}

@php
$i3=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="3" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i3=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่2><-->
@if($i3==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>3</p>    
        <input type="hidden" name="hold" value="3" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif


{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่4 --}}

@php
$i4=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="4" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i4=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่4><-->
@if($i4==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>4</p>    
        <input type="hidden" name="hold" value="4" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif


{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่5 --}}

@php
$i5=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="5" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i5=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่5><-->
@if($i5==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>5</p>    
        <input type="hidden" name="hold" value="5" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif



{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่6 --}}

@php
$i6=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="6" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i6=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่6><-->
@if($i6==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>6</p>    
        <input type="hidden" name="hold" value="6" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif



{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่7 --}}

@php
$i7=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="7" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i7=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่7><-->
@if($i7==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>7</p>    
        <input type="hidden" name="hold" value="7" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif




{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่8 --}}

@php
$i8=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="8" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i8=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่8><-->
@if($i8==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>8</p>    
        <input type="hidden" name="hold" value="8" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif


{{-- -------------------------------------------------------------------------------- --}}

{{-- หลุมปลูกที่9 --}}

@php
$i9=0;
@endphp

@if($list)
@foreach ($list as $item)
@if( $item->hold =="9" && $item->dropped == NULL && $item->harvest == NULL)
    <tr>
        @php
         $i9=1;   
        @endphp
        <td>{{$item->hold}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->status}}</td>
        <td>{{$item->created_at->toFormattedDateString()}}</td>

        <td>
            <?php

            echo  $item->created_at->diffInDays($from);
            
            ?>
        </td>
        
        
        <td>
        <form action="{{url('task',[$item->id])}}" method="post">
            <input type="hidden" name="_method"  value="PUT"/>
            {{csrf_field()}} 
            <div class="form-group">
                <input type="hidden" name="hold" value = "{{$item->hold}}" />
                <input type="hidden" name="name" value = "{{$item->name}}" />
                <input type="hidden" name="status" value = "{{$item->status}}" />
                <input type="hidden" name="dropped" value = "" />
                <input type="submit" name="harvest" class="btn btn-success " value="เก็บเกี่ยว"/>
            </div>
        </form>
        </td>

        <td>
            <form action="{{url('task',[$item->id])}}" method="post">
                <input type="hidden" name="_method"  value="PUT"/>
                {{csrf_field()}} 
                <div class="form-group">
                    <input type="hidden" name="hold" value = "{{$item->hold}}" />
                    <input type="hidden" name="name" value = "{{$item->name}}" />
                    <input type="hidden" name="status" value = "{{$item->status}}" />
                    <input type="hidden" name="harvest" value = "NULL" />
                    <input type="submit" name="dropped" class="btn btn-danger " value="ละทิ้ง"/>
                </div>
            </form>
        </td>
        @else
            
        @endif
    </tr>
@endforeach
@endif





</thead>
<tbody>

<!--หลุมปลูกที่9><-->
@if($i9==0)
    <tr>
        
        <form method="post" action="{{url('task')}}">
            {{csrf_field()}} 

        <td>
        <p>9</p>    
        <input type="hidden" name="hold" value="9" </input>
        </td>
        <td>
            <div class="form-group">
                <select name="name" id="name">
                <option value="">เลือกชื่อผัก</option>
                <option value="กรีนคลอรัล">กรีนคลอรัล</option>
                <option value="กรีนคอส">กรีนคอส</option>
                <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
                <option value="กวางตุ้ง">กวางตุ้ง</option>
                <option value="บัตเตอร์เฮด">บัตเตอร์เฮด</option>
                <option value="ผักบุ้งจีน">ผักบุ้งจีน</option>
                <option value="ฟิลเล่ไอซ์เบิร์ก">ฟิลเล่ไอซ์เบิร์ก</option>
                <option value="เรดคลอรัล">เรดคลอรัล</option>
                <option value="เรดคอส">เรดคอส</option>
                <option value="เรดโอ๊ค">เรดโอ๊ค</option>
                
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/> 
            </div>
        </td>
        <td>
            
        </td>
        <td>
            
            
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="harvest" value = NULL />
                <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="hidden" name="dropped" value = NULL />
                <input disabled type="submit" name="status" class="btn btn-danger " value="ละทิ้ง"/> 
            </div>
        </td>
    </form>

    </tr>

@endif



        </tbody>
    </table>
    
</div>

@endsection