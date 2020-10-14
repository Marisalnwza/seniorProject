<body>

    {{$user[0]->username}}



    <table class="table">
        <thead class="thread-dark">
            
            <tr>
                <th scope="col">ภารกิจ</th>
                <th scope="col">สถานะภารกิจ</th>
                <th scope="col">คะแนนที่ได้รับ</th>
            </tr>

            @for($i=0;$i<count($data);$i++)
            <tr>
                <td><center>{{$data[$i]->info}}</center></td>
                <@if ($data[$i]->statusquest == "clear")
                    <td><center>{{$data[$i]->statusquest}}</center></td>
                @else
                <td><center>/{{$data[$i]->value}}</center></td>
                @endif>
                <td><center>{{$data[$i]->reward}}</center></td>
            </tr>
            @endfor

        </tbody>
    </table>
</body>