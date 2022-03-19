<?php 
    session_start();
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(16));
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require_once 'Scripts/PHP/page_look_head.php';
    ?>
    <title>Rejestracja</title>
</head>
<body>
    <?php
        require_once 'Scripts/PHP/navbar-content.php';
    ?>

    <div>
        <div class="inputPosition">
            <div class="image-register-promotion">
                <div class="icon-promotion">
                    <img src="Images/WEBSITE IMAGES/gym-icon-8.png" class="icons icon-1" title="Ikona ciężarka typu Kettlebell" alt="Ikona ciężarka typu Kettlebell">
                    <p>Osiągaj coraz lepsze wyniki</p>
                </div>
                <div class="icon-promotion">
                    <img src="Images/WEBSITE IMAGES/gym-icon-2.png" class="icons icon-2" title="Ikona rowerka stacjonarnego" alt="Ikona rowerka stacjonarnego">
                    <p>Zwiększaj swoją wydolność</p>
                </div>
                <div class="icon-promotion">
                    <img src="Images/WEBSITE IMAGES/gym-icon-4.png" class="icons icon-3" title="Ikona wagi" alt="Ikona wagi">
                    <p>Kontroluj swoją wagę</p>
                </div>
                <div class="icon-promotion">
                    <img src="Images/WEBSITE IMAGES/gym-icon-5.png" class="icons icon-4" title="Ikona maty do ćwiczenia" alt="Ikona maty do ćwiczenia">
                    <p>Relaksuj się i odpoczywaj trenując</p>
                </div>
            </div>
            <form action="Scripts/PHP/register.inc.php" class="registerFormPogu" method="post">
                <div class="input-positions-fields">
                    <div class="left-input-pos-field">
                        <img src="Images/WEBSITE IMAGES/fitness-vertical-banner_2.png" class="vBanner" alt="fitness promotion vertical banner">
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
                            <input type="email" name="email" id="email" class="a inputLogin" placeholder=" "> 
                            <label for="email" class="floating-label">E-mail</label>
                        </div>
                        <div class="field">
                            <input type="password" name="password" id="password" class="inputLogin" placeholder=" " autocomplete="on">
                            <label for="password" class="floating-label">Hasło</label>
                        </div>
                        <div class="field">
                            <input type="password" name="checkPassword" id="chckpassword" class="inputLogin" placeholder=" " autocomplete="on">
                            <label for="chckpassword" class="floating-label">Potwierdź hasło</label>
                        </div>
                        <input type="text" name="token" value="<?php echo $_SESSION["token"];?>" hidden>
                        <div><input type="checkbox" name="tos"><p class="tos">Akceptuję <a href="Regulamin.php">regulamin</a> sklepu</p></div>
                        <input type="submit" name="submitSub" class="button-29 floating" value="Zarejestruj się">
                        <div class="errParContainer"><p class="errorParagraph"></p></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>
</html>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/login-js-module.js" crossorigin="anonymous"></script>
<?php
    if(empty($_GET))
    {
        echo "<script src='Scripts/JS/gsap-signup-animation.js' crossorigin='anonymous'></script>";
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
