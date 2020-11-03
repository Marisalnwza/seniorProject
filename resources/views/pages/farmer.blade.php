<body>

    {{$user[0]->username}}<br>
    point : {{$user[0]->point}}<br>
    rank : {{$user[0]->rank}}


    <table class="table">
        <thead class="thread-dark">
            
            <tr>
                <th scope="col">#</th>
                <th scope="col">ภารกิจ</th>
                <th scope="col">สถานะภารกิจ</th>
                <th scope="col">คะแนนที่ได้รับ</th>
            </tr>

            @for($i=0;$i<count($data);$i++)
            <tr>
                
                <td>{{$i+1}}</td>
                <td><center>{{$data[$i]->info}}</center></td>

                <@if ($data[$i]->statusquest == "clear")
                    <td><center>{{$data[$i]->statusquest}}</center></td>
                @else
                    <td><center>/{{$data[$i]->value}}</center></td>
                @endif>

                <td><center>{{$data[$i]->reward}}</center></td>

                @if($data[$i]->statusquest == "clear")
                <td><center>
                       <button type="submit" class= btn btn-success"> รับคะแนน </button>  
                </center></td>
                @endif

            </tr>
            @endfor

        </tbody>
    </table>
</body>