<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="./Scripts/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<body>
    <div id="header">
        <div id="logo">
            <img src="./Images/logo.png" alt="logo">
        </div>
        <div id="login">
            <form action="login.php" method="post">
                Login: <input type="text" name="login"> <br> <br>
                Hasło: <input type="password" name="password"> <br> <br>
                <input type="submit" name="subimtSub" value="Zaloguj się">   
            </form>
            <br>
            <a href="../Scripts/signup.php">Nie masz konta? Zarejestruj się!</a>
        </div>
    </div>
    <div id="navi">
        <div class="naviplate">
            Strona Główna
        </div>
        <div class="naviplate">
            Trenerzy
        </div>
        <div class="naviplate">
            Siłownie
        </div>
        <div class="naviplate">
            Profil
        </div>
    </div>
    <div id="content">
        Lorem ipsum
    </div>
    <div id="footer">
        Projekt Aplikacje/Bazy <i>Eryk Sowacki & Oskar Wichtowski</i>
    </div>
</body>
</html>