@extends('master')
@section('title','นับวันปลูก')
@section('content')

<div class="container">
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
        </thead>
        <tbody>

            <!--หลุมปลูกที่1><-->
            
                <tr>
                    
                    <form method="post" action="{{url('task')}}">
                        {{csrf_field()}}  
                    <td>
                        <p>1</p>
                        <input type="hidden" name="hold" value="1"/>
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
                            <input  disabled type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input disabled type="submit" name="status" class="btn btn-danger " value="ทิ้ง"/> 
                        </div>
                    </td>
                </form>

                </tr>

                
        
                @if($list)
                @foreach ($list as $item)
                @if( $item->hold === 1)
                    <tr>
                        <td>{{$item->hold}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at}}</td>

                        <td>
                            <?php
 
                            echo  $item->created_at->diffInDays($from);
                            
                            ?>
                        </td>
                        
                        
                        <td>
                            <div class="form-group">
                                <input type="submit" name="status" class="btn btn-success " value="เก็บเกี่ยว"/> 
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="submit" name="status" class="btn btn-danger " value="ทิ้ง"/> 
                            </div>
                        </td>
                        @else
                            
                        @endif
                    </tr>
                @endforeach
                @endif
            




        </tbody>
    </table>
    
</div>

@endsection