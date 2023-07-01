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
        {{-- {{ dd($data->email) }} --}}
        Please, enter this otp : <b>{{ $data->otp }}</b> to verify.
        <a href="{{ route('exporter.view.verify.otp', $data->email) }}" target="blank">link here</a>
    </p>

    <br>
    <br>

    <b>Regards</b>,<br />
    <span>Publicity Officer</span>
    <span>DEPM</span>

</body>

</html>
