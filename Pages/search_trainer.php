<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="../Scripts/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search trainer</title>
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
        <?php

            if(!isset($_POST['city']) && !isset($_POST['gymName']) && !isset($_POST['trainerSex']) && !isset($_POST['minTrainerMark']) && !isset($_POST['maxTrainerMark']) && !isset($_POST['minPrize']) && !isset($_POST['maxPrize']))
            {
                // header('Location: index.php');
            }
            else
            {
                require_once '../Scripts/connect_user.php';

                if($connect -> connect_errno)
                {
                    echo "Błędne połączenie z bazą danych.";
                }
                else
                {
                    $city = $_POST['city'];
                    $gymName = $_POST['gymName'];
                    $trainerSex = $_POST['trainerSex'];
                    $minTrainerMark = $_POST['minTrainerMark'];
                    $maxTrainerMark = $_POST['maxTrainerMark'];
                    $minPrize = $_POST['minPrize'];
                    $maxPrize = $_POST['maxPrize'];

                    //$sql = "SELECT * FROM `trainers` where `miasto` like '$city'";
                    //$result = $connect -> query($sql);
                    while($trainer = $result -> fetch_assoc())
                    {
                        echo <<< TRAINERS
                            <div id="trainer">
                                Imię i nazwisko:
                                $trainer[name] $trainer[surname]
                                Nazwa siłowni:
                                $trainer[gymName]
                                Opinia:
                                $trainer[mark]
                                Cena:
                                $trainer[prize]
                            </div>

                        TRAINERS;
                    }
                }
                $connect -> close();
            }

        //     <div id="content" class="d-flex justify-content-center">
        //     <h2>Szukaj trenera personalnego</h2>
        //     <form action="search_trainer.php" method="post" class="d-flex">
        //         <h4>Miasto:</h4>
        //         <input type="text" placeholder="Np. Poznań" name="city">
        //         <h4>Nazwa siłowni:</h4>
        //         <input type="text" placeholder="Np. Fabryka Formy" name="gymName">
        //         <h4>Płeć trenera:</h4>
        //         <select name="trainerSex">
        //             <option value="woman">Kobieta</option>
        //             <option value="man">Mężczyzna</option>
        //         </select>
        //         <h4>Ocena:</h4>
        //         <input type="text" placeholder="od:" name="minTrainerMark">
        //         <input type="text" placeholder="do:" name="maxTrainerMark">
        //         <h4>Cena:</h4>
        //         <input type="text" placeholder="od" name="minPrize"> 
        //         <input type="text" placeholder="do:" name="maxPrize">
        //         <input type="submit" value="Szukaj">
        //     </form>
        // </div>
        ?>
    </center>
    <div id="footer">
        Projekt Aplikacje/Bazy <i>Eryk Sowacki & Oskar Wichtowski</i>
    </div>
</body>
</html>