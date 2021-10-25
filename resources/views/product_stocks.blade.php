<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <thead>
    <tr>
        <td>
            <button onclick="createStock({{$product['idproduct']}})">CREATE</button>
        </td>

            <th><b>WAREHOUSE</b></th>
            <th><b>STOCK</b></th>
            <th><b>RESERVED</b></th>
            <th><b>RESERVEDBACKORDERS</b></th>
            <th><b>RESERVEDPICKLISTS</b></th>
            <th><b>RESERVEDALLOCATIONS</b></th>
            <th><b>FREESTOCK</b></th>


    </tr>

    </thead>

    @foreach($stocks as $stock)
        <tr>
            <td>
                <button onclick="updateStock({{$stock['idproduct_stock_history']}})">UPDATE</button>
                <button onclick="deleteStock({{$stock['idproduct_stock_history']}})">DELETE</button>

            </td>

            <td>{{$stock->warehouse()->first()->name}}</td>
            <td>{{$stock['stock']}}</td>
            <td>{{$stock['reserved']}}</td>
            <td>{{$stock['reservedbackorders']}}</td>
            <td>{{$stock['reservedpicklists']}}</td>
            <td>{{$stock['reservedallocations']}}</td>
            <td>{{$stock['freestock']}}</td>

        </tr>
    @endforeach

</table>



