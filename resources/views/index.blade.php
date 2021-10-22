<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table width="100%" border="1">
@foreach($orders as $order)
<tr>
    <td>{{$order['idorder']}}</td>
    <td>{{$order['idcustomer']}}</td>
    <td>{{$order['idtemplate']}}</td>


</tr>
    @endforeach
</table>
</body>
</html>