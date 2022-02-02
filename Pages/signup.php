
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="../Scripts/bootstrap.css">
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
        <form action="../Scripts/register.inc.php" method="post">
            Imię: <input type="text" name="name" class="a"> <br> <br>
            Nazwisko: <input type="text" name="surname" class="a"> <br> <br>
            Wiek: <input type="number" name="age" class="a"> <br> <br>
            E-mail: <input type="email" name="email" class="a">
            <?php
                if(isset($_GET['takenEmail']))
                {
                    echo "<span style='color: red'>Podany e-mail istnieje już w bazie!</span>";
                }
            ?>
            <br> <br>
            Hasło: <input type="password" name="password"> <br> <br>
            Potwierdź hasło: <input type="password" name="checkPassword">
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
