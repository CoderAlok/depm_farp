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
    <b>Dear Principle Secretory,</b>
    <p>
        Application No : {{ $data['app_no'] ?? '' }} has been appealed by the exporter.
    </p>

    <br>
    <br>

    <b>Regards</b>,<br />
    <span>{{ $data['exporter_name']->name ?? '' }}</span>
    <span>Exporter</span>

</body>

</html>
