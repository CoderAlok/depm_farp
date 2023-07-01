<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <h4>{{ $title . ($data->regsitration_status === 1 ? ' approved' : ' rejected') }}</h4>
    <b>Dear Exporter,</b>

    @if ($data->regsitration_status === 1)
        <p>Congratulations, your application has been approved from our side and following are the credentials that you
            will
            require to log into the exporter portal.</p>

        <span>Username : <b>{{ $data->username }}</b></span>
        <span>Password : <b>12345678</b></span>
        <span>Email : <b>{{ $data->email }}</b></span>

        <p>Please, click this link to login. <a href="{{ route('welcome') }}">Login here</a></p>
    @else
        <p>Sorry, your application has been rejected from our side. Here is a remarks form our higher authority that has
            been delivered during scrutiny process.</p>
        <b>{{ $data->get_remarks_details->remarks }}</b>
        <p>Please, click this link to register again. <a href="{{ route('exporter.register') }}">Register here</a></p>
    @endif

    <br>
    <br>

    <b>Regards</b>
    <span>Publicity Officer</span>
    <span>DEPM</span>
</body>

</html>
