<table width="100%" border="1">
    @foreach($orders as $order)
        <tr>
            <td>{{$order['idorder']}}</td>
            <td>{{$order['idcustomer']}}</td>
            <td>{{$order['idtemplate']}}</td>


        </tr>
    @endforeach
</table>