<?php 
    session_start();
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(16));
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="..\Scripts\CSS\bootstrap-5.0.2-dist\css\bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="..\Scripts\CSS\style.css" crossorigin="anonymous">
    <link rel="shortcut icon" href="..\Images\WEBSITE IMAGES\LOGO.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <?php
        require_once('..\Scripts\PHP\navbar-content.php');
    ?>

    <div>
        <div class="inputPosition">
            <div class="image-register-promotion">
                <div class="icon-promotion">
                    <img src="..\Images/WEBSITE IMAGES\gym-icon-8.png" class="icons icon-1" title="Ikona ciężarka typu Kettlebell" alt="Ikona ciężarka typu Kettlebell">
                    <p>Osiągaj coraz lepsze wyniki</p>
                </div>
                <div class="icon-promotion">
                    <img src="..\Images/WEBSITE IMAGES\gym-icon-2.png" class="icons icon-2" title="Ikona rowerka stacjonarnego" alt="Ikona rowerka stacjonarnego">
                    <p>Zwiększaj swoją wydolność</p>
                </div>
                <div class="icon-promotion">
                    <img src="..\Images/WEBSITE IMAGES\gym-icon-4.png" class="icons icon-3" title="Ikona wagi" alt="Ikona wagi">
                    <p>Kontroluj swoją wagę</p>
                </div>
                <div class="icon-promotion">
                    <img src="..\Images\WEBSITE IMAGES\gym-icon-5.png" class="icons icon-4" title="Ikona maty do ćwiczenia" alt="Ikona maty do ćwiczenia">
                    <p>Relaksuj się i odpoczywaj trenując</p>
                </div>
            </div>
            <form action="..\Scripts\PHP\register.inc.php" method="post">
                <div class="input-positions-fields">
                    <div class="">

                    </div>
                    <div class="input-containers">
                        <div class="field">
                            <input type="text" name="name"  id="name" class="a inputLogin" placeholder=" " autocomplete="off" > 
                            <label for="name" class="floating-label">Imię</label>
                        </div>
                        <div class="field">
                            <input type="text" name="surname" id="surname" class="a inputLogin" placeholder=" " autocomplete="off"> 
                            <label for="surname" class="floating-label">Nazwisko</label>
                        </div>
                        <div class="field">
                            <input type="number" name="age" id="age" class="a inputLogin" placeholder=" "  autocomplete="off"> 
                            <label for="age" class="floating-label">Wiek</label>
                        </div>
                        <div class="field">
                            <input type="email" name="email" id="email" class="a inputLogin" placeholder=" "> 
                            <label for="email" class="floating-label">E-mail</label>
                        </div>
                        <?php
                            if(isset($_GET['takenEmail']) && isset($_GET['emailValidateError']))
                            {
                                echo "<p class='invalidInput' >Podany e-mail istnieje już w bazie!</p>";
                            }
                            else
                            {
                                if(isset($_GET['takenEmail']))
                                {
                                    echo "<p class='invalidInput' >Podany e-mail istnieje już w bazie!</p>";
                                }
                                if(isset($_GET['emailValidateError']))
                                {
                                    echo "<p class='invalidInput' >Podany e-mail nie przeszedł wymaganych oczekiwań spróbuj ponownie</p>";
                                }
                            }
                        ?>
                        <div class="field">
                            <input type="password" name="password" id="password" class="inputLogin" placeholder=" " autocomplete="on">
                            <label for="password" class="floating-label">Hasło</label>
                        </div>
                        <div class="field">
                            <input type="password" name="checkPassword" id="chckpassword" class="inputLogin" placeholder=" " autocomplete="on">
                            <label for="chckpassword" class="floating-label">Potwierdź hasło</label>
                            <?php
                                if(isset($_GET['invalidPasswd']) )
                                {
                                    echo "<p class='invalidInput' >Hasła się nie zgadzją!</p>";
                                }
                            ?>
                        </div>
                        <input type="text" name="token" value="<?php echo $_SESSION["token"];?>" hidden>
                        <input type="checkbox" name="tos" checked><p class="tos">Akceptuję <a href="Regulamin.php">regulamin</a> sklepu</p>
                        <input type="submit" name="submitSub" class="button-29 floating" value="Zarejestruj się">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script src="..\Scripts\node_modules\gsap\dist\gsap.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\node_modules\jquery\dist\jquery.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\gsap-search-animation.js" crossorigin="anonymous"></script>
<?php
    if(empty($_GET))
    {
    echo "<script src='..\Scripts\JS\gsap-signup-animation.js' crossorigin='anonymous'></script>";
    }
    if(isset($_GET['emptyInput']))
    {
        echo "<script>let inputAddon;</script>";
        $i = 0;
        foreach($_GET as $key => $value)
        {
            $value = trim($value);
            if($value != "")
            {
                echo "<script>inputAddon = document.getElementsByClassName('a')[$i]; inputAddon.value ='".$value."';</script>";
            }
            $i += 1;
        } 
    }
?>
