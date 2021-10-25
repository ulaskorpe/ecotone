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

    @php
     $count =1;
     @endphp
    <tr><td colspan="{{count($fields)}}"><b>PRODUCTS</b></td>
             @foreach($order->order_products as $op)
                 <tr><td colspan="{{count($fields)}}">
                         <table border="1" cellspacing="0" cellpadding="0">
                             <tr>
                                 <td>{{$count}} -</td>
                                 @foreach($fields_op as  $f)
                                 <td width="100">{{$op[$f]}}</td>
                                     @endforeach

                             </tr>

                         </table>


                     </td></tr>
        @php
            $count++;
        @endphp
                @endforeach

        </tr>
    @endforeach

</table>