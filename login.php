<?php
    session_start();
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(16));
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require_once "Scripts/PHP/page_look_head.php";
    ?>
    <title>Logowanie</title>
</head>
<body>
    <?php
        require_once 'Scripts/PHP/navbar-content.php';
    ?>
    <div class="loginPanel">
        <div class="leftLogin">

        </div>
        <div class="centerLogin input-positions-fields">
            <div>
                <form action="Scripts/PHP/login.inc.php" class="loginFormSt" method="post">    
                    <div class="input-containers">
                        <div class="field">
                            <input type="email" id="email" name="email" value="oskar.wichtowski3@gmail.com" class="a inputLogin" placeholder=" " autocomplete="off">
                            <label for="email" class="floating-label">Email</label>
                        </div>
                        <div class="field">
                            <input type="password" id="password" name="password" value="ppp" class="a inputLogin" placeholder=" " autocomplete="off">
                            <label for="password" class="floating-label">Hasło</label>
                            <input type="text" name="token" value="<?php echo $_SESSION["token"];?>" hidden>
                        </div>
                    </div>
                    <input type="submit" class="button-19 buttorson" value="Prześlij">
                </form>  
            </div>
            <div style="text-align: center;">
                <img src="Images/WEBSITE IMAGES/fitness-vertical-banner.jpg" class="fitImg" alt="">
            </div>
        </div>
        <div class="rightLogin">
        </div>
    </div>
    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>    
</body>
</html>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>