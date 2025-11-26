<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Verification Code Page</title>
</head>
<body>
{{-- please use the following verification code to complete your action: --}}
<p>Hi, {{$name}}</p>
<p>Your Login Verification code is : <strong>{{ $code }}</strong>
<p> Please enter this code to complate your login.</p>
</body>
</html>