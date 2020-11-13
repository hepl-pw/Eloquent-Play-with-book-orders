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
<h1>Orders with current status, but not 4 or 5</h1>
<table>
    <tr>
        <th>User</th>
        <th>Order #</th>
        <th>Current Status</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->owner_name}}</td>
            <td>{{$order->id}}</td>
            <td>{{$order->current_status_name}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
