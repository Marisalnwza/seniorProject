<body>

    {{$user[0]->username}}



    <table class="table">
        <thead class="thread-dark">
            
            <tr>
                <th scope="col">ภารกิจ</th>
                <th scope="col">คะแนนที่ได้รับ</th>
                <th scope="col">สถานะ</th>
                

            </tr>

            @for($i=0;$i<count($data);$i++)
            <tr>
                <td>{{$data[$i]->info}}</td>
                <td>{{$data[$i]->reward}}</td>
                <td>{{$data[$i]->statusquest}}</td>
            </tr>
            @endfor

        </tbody>
    </table>
</body>