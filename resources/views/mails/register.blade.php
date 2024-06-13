<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm account</title>
</head>
<body>
    <h1 style="width: 100%; padding: 0.5rem; color: #FFFFFF; background: #0A6FB4;">Confirm your account</h1>
    <br>
    <p>Welcome <b>{{ $data[ 'name' ] }}</b></p>
    <p>Your account is almost completed, click the next link to confirm your account:</p>
    <a href="{{ $data[ 'link' ] }}" target="_blank">Click here</a>
    <br>
    <p>If you did not create this account, please  ignore this email and delete</p>
    <p style="color:#0A6FB4; text-align: center;"><b>Hotel Dev</b></p>
    <br>
    <hr style="background: #0A6FB4; padding: 1rem; width: 100%;">
</body>
</html>
