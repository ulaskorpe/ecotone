<form id="update-product" action="{{route('update-product-post')}}" method="post"
      enctype="multipart/form-data">
    {{csrf_field()}}
    <table>
        <tr><td colspan="3">UPDATE PRODUCT FORM</td></tr>
        <tr><td>IDPRODUCT</td><td>{{$product['idproduct']}}<input type="hidden"  name="idproduct" id="idproduct" value="{{$product['idproduct']}}"></td><td></td></tr>
        <tr><td>PRODUCTCODE</td><td>{{$product['productcode']}}<input type="hidden"  name="productcode" id="productcode" value="{{$product['productcode']}}"></td><td></td></tr>
        <tr><td>VATGROUP</td><td>
                <select name="idvatgroup" id="idvatgroup">

                    @foreach($vatgroups as $vatgroup)
                        <option value="{{$vatgroup['idvatgroup']}}"  @if($product['idvatgroup']==$vatgroup['idvatgroup']) selected @endif>{{$vatgroup['name']}} , {{$vatgroup['idvatgroup']}}%</option>
                    @endforeach
                </select>
            </td><td><span id="idvatgroup_error"></span></td></tr>

        <tr><td>IDSUPPLIER</td><td>
                <select name="idsupplier" id="idsupplier">

                    @foreach($suppliers as $supplier)
                        <option value="{{$supplier['idsupplier']}}" @if($product['idsupplier']==$supplier['idsupplier']) selected @endif>{{$supplier['name']}} , {{$supplier['contactname']}}</option>
                    @endforeach
                </select>
            </td><td><span id="idsupplier_error"></span></td></tr>


        @foreach($required_array as $item)
            <tr><td>{{strtoupper($item)}}</td><td><input type="text" name="{{$item}}" id="{{$item}}" value="{{$product[$item]}}"></td><td colspan="2"><span id="{{$item}}_error"></span></td></tr>

        @endforeach


        @foreach($optional_array as $item)
            <tr><td>{{strtoupper($item)}}</td><td><input type="text" name="{{$item}}" id="{{$item}}" value="{{$product[$item]}}"></td><td colspan="2"><span id="{{$item}}_error"></span></td></tr>

        @endforeach
        <tr><td></td><td colspan="2">

                <button type="submit" id="btn-1">UPDATE</button>

            </td></tr>
    </table>

</form>
<script src="{{url('js/save.js')}}"></script>
<script>

    var send=false;

    $('#update-product').submit(function (e) {
        if(!send) {
            e.preventDefault();


            var formData = new FormData(this);
            var error = false;
            if ($('#idvatgroup').val() == '0') {
                $('#idvatgroup_error').html('<span style="color: red">PLEASE SELECT</span>');
                error = true;
            } else {
                $('#idvatgroup_error').html('');
            }
            if ($('#idsupplier').val() == '0') {
                $('#idsupplier_error').html('<span style="color: red">PLEASE SELECT</span>');
                error = true;
            } else {
                $('#idsupplier_error').html('');
            }

            @foreach($required_array as $item)
            if ($('#{{$item}}').val() == '') {
                $('#{{$item}}_error').html('<span style="color: red">REQUIRED</span>');
                error = true;
            } else {
                $('#{{$item}}_error').html('');
            }
            @endforeach





            if (error) {
                return false;
            }else{
                send=true;
            }


        }else{
            $('#update-product').submit();
        }



    });
</script>