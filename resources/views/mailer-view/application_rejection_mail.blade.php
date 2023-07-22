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
    <p>
        Your application no <b>{{ $data['app_no'] }}</b> has been rejected. <br />
        Please, login to your account and find these rejected list in the application rejected list.
    </p>

    <p>{{ $data['remarks'] }}</p>

    <br>
    <br>

    <b>Regards</b>,<br />
    <span>{{ $data['user_role'] }}</span>
    {{-- <span>DEPM</span> --}}

</body>

</html>
