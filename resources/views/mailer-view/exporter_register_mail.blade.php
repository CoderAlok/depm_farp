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
        Congratulations, You have been successfully registered in the portal with application no :
        <b>{{ $data->app_no ?? '' }}</b>
        Please, wait for the scrutiny process to complete by the authority. After completion of scrutiny process
        you will recieve an email with your email and password and a link to login to your
        respective account.
    </p>
    <p>
        Please, check your email to get notified regarding the further process.
    </p>

    <br>
    <br>

    <b>Regards</b>,<br />
    <span>Publicity Officer</span>
    <span>DEPM</span>

</body>

</html>
