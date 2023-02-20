<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
 <p style="font-size:3rem">Good Day {{ $user->user->name }}!. This is a reminder that you have an appointment scheduled for ocassion {{ $user->ocassion->name }} this coming {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->start_time)->format('M d Y g:i A')}}. We are looking Forward to seeing you. Thank You.</p> 
</body>
</html>