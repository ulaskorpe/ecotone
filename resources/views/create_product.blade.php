<form id="create-product" action="{{route('create-product-post')}}" method="post"
      enctype="multipart/form-data">
{{csrf_field()}}
    <table>
        <tr><td colspan="3">CREATE PRODUCT FORM</td></tr>
        <tr><td>IDPRODUCT</td><td>{{$idproduct}}<input type="hidden"  name="idproduct" id="idproduct" value="{{$idproduct}}"></td><td></td></tr>
        <tr><td>PRODUCTCODE</td><td>{{$productcode}}<input type="hidden"  name="productcode" id="productcode" value="{{$productcode}}"></td><td></td></tr>
        <tr><td>VATGROUP</td><td>
                <select name="idvatgroup" id="idvatgroup">
                    <option value="0">SELECT</option>
                    @foreach($vatgroups as $vatgroup)
                        <option value="{{$vatgroup['idvatgroup']}}">{{$vatgroup['name']}} , {{$vatgroup['idvatgroup']}}%</option>
                    @endforeach
                </select>
            </td><td><span id="idvatgroup_error"></span></td></tr>

        <tr><td>IDSUPPLIER</td><td>
                <select name="idsupplier" id="idsupplier">
                    <option value="0">SELECT</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{$supplier['idsupplier']}}">{{$supplier['name']}} , {{$supplier['contactname']}}</option>
                    @endforeach
                </select>
            </td><td><span id="idsupplier_error"></span></td></tr>


        @foreach($required_array as $item)
            <tr><td>{{strtoupper($item)}}</td><td><input type="text" name="{{$item}}" id="{{$item}}"></td><td colspan="2"><span id="{{$item}}_error"></span></td></tr>

            @endforeach


        @foreach($optional_array as $item)
            <tr><td>{{strtoupper($item)}}</td><td><input type="text" name="{{$item}}" id="{{$item}}"></td><td colspan="2"><span id="{{$item}}_error"></span></td></tr>

        @endforeach
        <tr><td></td><td colspan="2">

                <button type="submit" id="btn-1">CREATE</button>

              </td></tr>
    </table>

</form>
<script src="{{url('js/save.js')}}"></script>
<script>

    var send=false;

    $('#create-product').submit(function (e) {
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
            $('#create-product').submit();
        }



    });
</script>