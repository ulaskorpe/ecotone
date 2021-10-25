<form id="create-product" action="{{route('create-stock-post')}}" method="post"
      enctype="multipart/form-data">
    {{csrf_field()}}
    <table>
        <tr><td colspan="3">CREATE STOCK FORM</td></tr>
        <tr><td>PRODUCT</td><td> {{$product['name']}} <input type="hidden" id="idproduct" name="idproduct" value="{{$product['idproduct']}}"></td></tr>
        <tr><td>WAREHOUSE</td>
        <td>
            <select name="idwarehouse" id="idwarehouse" required>
                <option value="0">SELECT</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{$warehouse['idwarehouse']}}">{{$warehouse['name']}}</option>
                    @endforeach
            </select>
        </td>
        </tr>
        <tr><td>STOCK</td><td><input type="number" id="stock" name="stock" value="0"></td></tr>
        <tr><td>RESERVED</td><td><input type="number" id="reserved" name="reserved" value="0"></td></tr>
        <tr><td>RESERVEDBACKORDERS</td><td><input type="number" id="reservedbackorders" name="reservedbackorders" value="0"></td></tr>
        <tr><td>RESERVEDPICKLISTS</td><td><input type="number" id="reservedpicklists" name="reservedpicklists" value="0"></td></tr>
        <tr><td>RESERVEDLOCATIONS</td><td><input type="number" id="reservedallocations" name="reservedallocations" value="0"></td></tr>
        <tr><td>FREESTOCK</td><td><input type="number" id="freestock" name="freestock" value="0"></td></tr>
        <tr><td></td><td colspan="2"><input type="submit" value="CREATE"></td></tr>
    </table>
</form>