<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <thead>
    <tr>
        <td>
            #
        </td>
        @foreach($fields as $field)
            <th><b>{{$field}}</b></th>
        @endforeach

    </tr>

    </thead>

    @foreach($orders as $order)
        <tr>
            <td>
                <button>UPDATE</button>
                <button>DELETE</button>
            </td>

            @foreach($fields as $field)
                @if(!empty($order[$field]))
                    <td>{{$order[$field]}}</td>
                @else
                    <td>-</td>
                @endif
            @endforeach
        </tr>
    @endforeach

</table>