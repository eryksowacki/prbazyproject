<!DOCTYPE html>
<?php
    session_start();
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(16));

?>
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
        <input type="text" name="email" value="oskar.wichtowski3@gmail.com">
        <input type="text" name="password" value="ppp">
        <input type="text" name="token" value="<?php echo $_SESSION["token"];?>" hidden>
        <input type="submit" value="Prześlij">
    </form>  
</body>
</html>