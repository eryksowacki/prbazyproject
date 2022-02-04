<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="../Scripts/bootstrap.css">
    <link rel="stylesheet" href="../Scripts/style.css">
    <link rel="shortcut icon" href="../Images/WEBSITE IMAGES/LOGO.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Znany trener</title>
</head>
<body id="bootstrap-overrides">
    <nav class="navbar navbar-light bg-dark">
            <div class="container" >
                <a href="index.php">
                    <img src="../Images/WEBSITE IMAGES/LOGO.png" alt="zdjęcie loga znany trener" id="logoImage">
                </a>
                <input type="text" name="" id="">
            </div>
        </nav>
        <div>
    </nav>
    <div id="header">
        <div id="logo">
            <!-- <img src="../Images/WEBSITE IMAGES/LOGO.png" alt="logo"> -->
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
    <div id="content" class="d-flex justify-content-center">
        <h2>Szukaj trenera personalnego</h2>
        <form action="index.php" method="post" class="d-flex">
            <h4>Miasto:</h4>
            <input type="text" placeholder="Np. Poznań" name="city">
            <h4>Nazwa siłowni:</h4>
            <input type="text" placeholder="Np. Fabryka Formy" name="gymName">
            <h4>Płeć trenera:</h4>
            <select name="trainerSex">
                <option value="woman">Kobieta</option>
                <option value="man">Mężczyzna</option>
            </select>
            <br><br>
            <h4>Ocena:</h4>
            <input type="text" placeholder="od:" name="minTrainerMark">
            <input type="text" placeholder="do:" name="maxTrainerMark">
            <h4>Cena:</h4>
            <input type="text" placeholder="od" name="minPrize"> 
            <input type="text" placeholder="do:" name="maxPrize">
            <input type="submit" value="Szukaj">
        </form>
    </div>
    <footer id="footer">
        <span id="footerText">Projekt Aplikacje/Bazy <i>Eryk Sowacki & <a href="https://github.com/Wichtowski">Oskar Wichtowski</a></i></span>
    </footer>
</body>
</html>