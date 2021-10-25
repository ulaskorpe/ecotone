<form id="create-product" action="{{route('update-stock-post')}}" method="post"
      enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="idproduct_stock_history" id="idproduct_stock_history" value="{{$stock['idproduct_stock_history']}}">
    <table>
        <tr><td colspan="3">UPDATE STOCK FORM</td></tr>
        <tr><td>PRODUCT</td><td> {{$product['name']}} <input type="hidden" id="idproduct" name="idproduct" value="{{$product['idproduct']}}"></td></tr>
        <tr><td>WAREHOUSE</td>
            <td>
                <select name="idwarehouse" id="idwarehouse" required>

                    @foreach($warehouses as $warehouse)
                        <option value="{{$warehouse['idwarehouse']}}" @if($stock['idwarehouse']==$warehouse['idwarehouse']) selected @endif>{{$warehouse['name']}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr><td>STOCK</td><td><input type="number" id="stock" name="stock" value="{{$stock['stock']}}"></td></tr>
        <tr><td>RESERVED</td><td><input type="number" id="reserved" name="reserved" value="{{$stock['stock']}}"></td></tr>
        <tr><td>RESERVEDBACKORDERS</td><td><input type="number" id="reservedbackorders" name="reservedbackorders" value="{{$stock['reservedbackorders']}}"></td></tr>
        <tr><td>RESERVEDPICKLISTS</td><td><input type="number" id="reservedpicklists" name="reservedpicklists" value="{{$stock['reservedpicklists']}}"></td></tr>
        <tr><td>RESERVEDLOCATIONS</td><td><input type="number" id="reservedallocations" name="reservedallocations" value="{{$stock['reservedallocations']}}"></td></tr>
        <tr><td>FREESTOCK</td><td><input type="number" id="freestock" name="freestock" value="0"></td></tr>
        <tr><td></td><td colspan="2"><input type="submit" value="UPDATE"></td></tr>
    </table>
</form>