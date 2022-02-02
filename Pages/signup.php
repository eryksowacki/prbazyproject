
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
</head>
<body>
    <nav class="navbar navbar-light bg-dark" style="height:120px;">
        <div class="container" style="margin-left:20px">
            <a href="">
                <img src="" alt="">
            </a>
        </div>
    </nav>
    <div>
        <form action="register.inc.php" method="post">
            <label for="name">Imię</label>
            <input type="text" name="name" class="a" id="name"> <br> <br>
            <label for="surname">Nazwisko</label>
            <input type="text" name="surname" class="a" id="surname"> <br> <br>
            <label for="age">Wiek</label>
            <input type="number" name="age" class="a" id="age"> <br> <br>
            <label for="email">E-mail</label>
            <input type="email" name="email" class="a" id="email"> <br> <br>
            <label for="password">Hasło</label
            <input type="password" name="password" id="password"> <br> <br>
            <label for="chckpassword">Potwierdź hasło</label>
            <input type="password" name="checkPassword" id="chckpassword">
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
