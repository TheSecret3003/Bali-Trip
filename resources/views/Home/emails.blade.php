<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Bali Tours</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Contact Message !</h1> <br><br>

    You received an email from : {{ $details['name'] }} <br><br>

    User details: <br><br>

    <p>Email:  {{ $details['email'] }}</p><br>
    <p>Phone Number:  {{ $details['phone'] }}</p><br>
    <p>Subject:  {{ $details['subject'] }}</p><br>
    </p>Message:  {{ $details['message'] }}</P><br><br>

    Thanks`
</body>
</html>