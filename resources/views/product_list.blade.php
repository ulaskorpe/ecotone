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

    @foreach($products as $product)
<tr>
    <td>
        <button onclick="updateProduct({{$product['idproduct']}})">UPDATE</button>
        <button onclick="deleteProduct({{$product['idproduct']}})">DELETE</button>
        <button onclick="listStocks({{$product['idproduct']}})">STOCKS</button>
    </td>

    @foreach($fields as $field)
    @if(!empty($product[$field]))
    <td>{{$product[$field]}}</td>
        @else
        <td>-</td>
        @endif
    @endforeach
</tr>
        @endforeach

</table>



