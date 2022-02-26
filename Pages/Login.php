<?php
    session_start();
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(16));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("..\Scripts\PHP\page_look_head.php")
    ?>
</head>
<body>
    <?php
        require_once ('..\Scripts\PHP\navbar-content.php');
    ?>
    <form action="..\Scripts\PHP\login.inc.php" method="post">    
        <input type="email" name="email" value="oskar.wichtowski3@gmail.com">
        <input type="password" name="password" value="ppp">
        <input type="text" name="token" value="<?php echo $_SESSION["token"];?>" hidden>
        <input type="submit" value="Prześlij">
    </form>  
</body>
</html>

<script src="..\Scripts\JS\gsap-search-animation.js" crossorigin="anonymous"></script>