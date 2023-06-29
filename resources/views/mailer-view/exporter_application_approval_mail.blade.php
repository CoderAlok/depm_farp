<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <h4>{{ $title }}</h4>
    <p>Congratulations, Your username : {{ $data->username }}, password : 12345678, Email : {{ $data->email }}
        and Login link : <a href="{{ route('welcome') }}">Login here</a></p>
</body>

</html>
