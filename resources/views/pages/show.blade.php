@extends('master')
@section('title','นับวันปลูก')
@section('content')



<div class="container">
    <table class="table">
        <thead class="thread-dark">
            <tr>
                <th scope="col">หลุมปลูกที่</th>
                <th scope="col">ชื่อผัก</th>
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
                
            
        </tbody>
    </table>
    
</div>

@endsection