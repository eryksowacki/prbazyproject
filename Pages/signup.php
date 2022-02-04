
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="../Scripts/bootstrap.css">
    <link rel="stylesheet" href="../Scripts/style.css">
    <link rel="shortcut icon" href="../Images/WEBSITE IMAGES/LOGO.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
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
    <div>
        <form action="register.inc.php" method="post">
            <div class="inputPosition">
                <div class="field">
                    <input type="text" name="name"  id="name" class="a inputLogin" placeholder=" "> 
                    <label for="name" class="floating-label">Imię</label>
                </div>
                <div class="field">
                    <input type="text" name="surname" id="surname" class="a inputLogin" placeholder=" "> 
                    <label for="surname">Nazwisko</label>
                </div>
                <div class="field">
                    <input type="number" name="age" id="age" class="a inputLogin" placeholder=" "> 
                    <label for="age">Wiek</label>
                </div>
                <div class="field">
                    <input type="email" name="email" id="email" class="a inputLogin" placeholder=" "> 
                    <label for="email">E-mail</label>
                </div>
                <?php
                if(isset($_GET['takenEmail']))
                {
                    echo "<span style='color: red'>Podany e-mail istnieje już w bazie!</span>";
                }
                ?>
                <div class="field">
                    <input type="password" name="password" id="password" class="inputLogin" placeholder=" ">
                    <label for="password">Hasło</label>
                </div>
                <div class="field">
                    <input type="password" name="checkPassword" id="chckpassword" class="inputLogin" placeholder=" ">
                    <label for="chckpassword">Potwierdź hasło</label>
                </div>
            </div>
            <?php
                if(isset($_GET['invalidPasswd']))
                {
                    echo "<span style='color: red'>Hasła nie są takie same!</span>";
                }
            ?>
            <br><br>
            <input type="submit" name="submitSub" value="Zarejestruj się">
        </form>
    </div>
</body>
</html>
<script>let x;</script>
<?php
if(isset($_GET['emptyInput']))
{
    $i = 0;
    foreach($_GET as $key => $value)
    {
        $value = trim($value);
        if($value != "")
        {
            echo "<script>x = document.getElementsByClassName('a')[$i]; x.value ='".$value."';</script>";
        }
        $i += 1;
    } 
}
?>
