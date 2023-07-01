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
    <b>Dear Exporter,</b>

    <p>Congratulations, your application has been approved from our side and following are the credentials that you will
        require to log into the exporter portal.</p>

    <span>Username : <b>{{ $data->username }}</b></span>
    <span>Password : <b>12345678</b></span>
    <span>Email : <b>{{ $data->email }}</b></span>

    <p>Please, click this link to login. <a href="{{ route('welcome') }}">Login here</a></p>
    
    <br>
    <br>

    <b>Regards</b>
    <span>Publicity Officer</span>
    <span>DEPM</span>
</body>

</html>
