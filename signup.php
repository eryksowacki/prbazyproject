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
            Imię: <input type="text" name="name" required> <br> <br>
            Nazwisko: <input type="text" name="surname" required> <br> <br>
            Wiek: <input type="number" name="age" required> <br> <br>
            E-mail: <input type="email" name="email" required> <br> <br>
            Hasło: <input type="password" name="password" required> <br> <br>
            Potwierdź hasło: <input type="password" name="checkPassword" required>
            <?php
                if(isset($_GET['invalidPasswd']))
                {
                    echo "<span style='color: red'>Hasła nie są takie same!</span>";
                }
            ?>
            <br>
            <input type="submit" value="Zarejestruj się">
        </form>
    </div>
</body>
</html>