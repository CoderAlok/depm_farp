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
        Congratulations, You have successfully registered in our portal with application no :
        <b>{{ $data->app_no ?? '' }}</b>
        Please, wait for the scrutiny process to complete by our higher authority. After completion of scrutiny process
        you will recieve a mail from our side with your email and password and a link to login to your
        respectiive account.
    </p>
    <p>
        Please, check your mail to get notified regarding the further process.
    </p>

    <br>
    <br>

    <b>Regards</b>,<br />
    <span>Publicity Officer</span>
    <span>DEPM</span>

</body>

</html>
