<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation book</title>
</head>
<body>
    <h1 style="width: 100%; padding: 0.5rem; color: #FFFFFF; background: #0A6FB4;">Confirm your account</h1>
    <br>
    <p>Welcome <b>{{ $data[ 'name' ] }}</b></p>
    <p>Your book was canceled:</p>
    <p>From: <b>{{ $data[ 'in' ] }}</b> to <b>{{ $data[ 'out' ] }}</b></p>
    @if( $data[ 'penalty' ] ){
        <p>This book will be chage due to was canceled on lest that 1 week</p>
    }
    <br>
    <p>If you do not recognize, please  ignore this email and delete it</p>
    <p style="color:#0A6FB4; text-align: center;"><b>Hotel Dev</b></p>
    <br>
    <hr style="background: #0A6FB4; padding: 1rem; width: 100%;">
</body>
</html>
