<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender</title>
</head>
<body>
     <h1> Bonjour {{$usersemail}}</h1>
    <p>Bienvenu, Nous vous notifion que un compte a été cree sur Bamas, vous allez recevoirr un mail de verification 
        veillez verifier votre email pour continuer!
        Cliquer sur le lien si dessous pour vous connecter.
    </p>
    <p>Parametre de connection:</br>
        <b>UserName</b>:{{$usersemail}}</br>
        <b>Password</b>:{{$password}}</br>
    </p>
    <a href="localhost:4200/#/respo">Bamas application</a>
</body>
</html>