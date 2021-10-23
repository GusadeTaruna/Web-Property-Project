<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h2>New Email arrived!</h2>
    <div>
        <h3>Email from : {{ $details['name'] }} ({{ $details['email_from'] }})</h3>
    </div>
    Message: <br>
    <p>{{ $details['msg'] }}</p>
    
</body>
</html>