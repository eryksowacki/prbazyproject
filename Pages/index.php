<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="../Scripts/bootstrap.css">
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
            <form action="../Scripts/login.inc.php" method="post">
                Login: <input type="text" name="login"> <br> <br>
                Hasło: <input type="password" name="password"> <br> <br>
                <input type="submit" name="submitSub" value="Zaloguj się">   
            </form>
            <br>
            <a href="signup.php">Nie masz konta? Zarejestruj się!</a>
        </div>
    </div>
    <center>
    <div id="content">
        <h2>Szukaj trenera personalnego</h2>
        <form action="search_trainer.php" method="post">
        <h4>Miasto:</h4> <br>
        <input type="text" placeholder="Np. Poznań" name="city"> <br><br>
        <h4>Nazwa siłowni:</h4> <br>
        <input type="text" placeholder="Np. Fabryka Formy" name="gymName"> <br><br>
        <h4>Płeć trenera:</h4> <br>
        <select name="trainerSex">
            <option value="woman">Kobieta</option>
            <option value="man">Mężczyzna</option>
        </select>
        <br><br>
        <h4>Opinia:</h4> <br>
        <input type="text" placeholder="od:" name="minTrainerMark"> <br><br>
        <input type="text" placeholder="do:" name="maxTrainerMark"> <br><br>
        <h4>Cena:</h4> <br>
        <input type="text" placeholder="od" name="minPrize"> <br><br>
        <input type="text" placeholder="do:" name="maxPrize"> <br><br>
        <input type="submit" value="Szukaj">
        </form>
    </div>
    </center>
    <div id="footer">
        Projekt Aplikacje/Bazy <i>Eryk Sowacki & Oskar Wichtowski</i>
    </div>
</body>
</html>