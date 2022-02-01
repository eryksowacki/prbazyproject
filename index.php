<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <div id="baner">
        <form action="login.php" method="post">
            Login: <input type="text" name="login"> <br> <br>
            Hasło: <input type="password" name="password"> <br> <br>
            <input type="submit" value="Zaloguj się">   
        </form>
        <br>
        <a href="register.php">Nie masz konta? Zarejestruj się!</a>
    </div>
</body>
</html>