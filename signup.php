<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <div id="baner">
        <form action="register.php" method="post">
            Imię: <input type="text" name="name"> <br> <br>
            Nazwisko: <input type="text" name="surname"> <br> <br>
            Wiek: <input type="number" name="age"> <br> <br>
            E-mail: <input type="email" name="email"> <br> <br>
            Hasło: <input type="password" name="password"> <br> <br>
            Potwierdź hasło: <input type="password" name="checkPassword"> <br> <br>
            <input type="submit" value="Zaloguj się">   
        </form>
        <br>
        <a href="signup.php">Nie masz konta? Zarejestruj się!</a>
    </div>
</body>
</html>