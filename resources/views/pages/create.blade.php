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
            
                <tr>
                    <th scope="row">1</th>
                    <form method="post" action="{{url('task')}}">
                        {{csrf_field()}}  
                    <td>
                        <div class="form-group">
                            <select name="name" id="name">
                            <option value="">เลือกชื่อผัก</option>
                            <option value="กรีนโอ๊ค">กรีนโอ๊ค</option>
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




<!--ลองเล่น-->
                <tr>
                    <th scope="row">1</th>
                    <form >
                    <td>
                        <div class="form-group">
                            <p>ต้นโอ๊ค
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <!--<input disabled type="submit" name="status" class="btn btn-primary" value="เริ่มปลูก"/>-->
                        </div>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
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
                </form>

                </tr>
           
                @if($list)
                @foreach ($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        @if($item->status === "เก็บเกี่ยว")
                            <td>
                                <div class="form-group">
                                    <input type="submit" name="status" class="btn btn-danger " value="ทิ้ง"/> 
                                </div>
                            </td>
                        @else
                            <td>...</td>
                        @endif
                    </tr>
                @endforeach
                @endif
            




        </tbody>
    </table>
    
</div>

@endsection