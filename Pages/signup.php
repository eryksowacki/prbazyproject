<?php 
    session_start();
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(16));
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="../Scripts/bootstrap.css">
    <link rel="stylesheet" href="../Scripts/style.css">
    <link rel="shortcut icon" href="../Images/WEBSITE IMAGES/LOGO.png" type="image/x-icon">
    <script src="..\node_modules\gsap\dist\gsap.min.js"></script>
    <script src="..\node_modules\jquery\dist\jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a href="index.php"><img src="../Images/WEBSITE IMAGES/LOGO.png" alt="zdjęcie loga znany trener" id="logoImage"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <div class="btn-search-bar">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trenerzy</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <form action="../Scripts/register.inc.php" method="post">
            <div class="inputPosition">
                <div class="image-register-promotion">
                    <div class="icons">
                        <img src="../Images/WEBSITE IMAGES/gym-icon-8.png" class="icon-1" title="Ikona ciężarka typu Kettlebell" alt="Ikona ciężarka typu Kettlebell">
                        <p>Osiągaj coraz lepsze wyniki</p>
                    </div>
                    <div class="">
                        <img src="../Images/WEBSITE IMAGES/gym-icon-2.png" class="icon-2" title="Ikona rowerka stacjonarnego" alt="Ikona rowerka stacjonarnego">
                        <p>Zwiększaj swoją wydolność</p>
                    </div>
                    <div class="">
                        <img src="../Images/WEBSITE IMAGES/gym-icon-4.png" class="icon-3" title="Ikona wagi" alt="Ikona wagi">
                        <p>Kontroluj swoją wagę</p>
                    </div>
                    <div class="">
                        <img src="../Images/WEBSITE IMAGES/gym-icon-5.png" class="icon-4" title="Ikona maty do ćwiczenia" alt="Ikona maty do ćwiczenia">
                        <p>Relaksuj się i odpoczywaj trenując</p>
                    </div>
                </div>

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
                            <label for="surname">Nazwisko</label>
                        </div>
                        <div class="field">
                            <input type="number" name="age" id="age" class="a inputLogin" placeholder=" "  autocomplete="off"> 
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
                            if(isset($_GET['emailValidateError']))
                            {
                                echo "<span style='color: red'>Podany e-mail nie<br> przeszedł wymaganych oczekiwań spróbuj ponownie</span>";
                            }
                        ?>
                        <div class="field">
                            <input type="password" name="password" id="password" class="inputLogin" placeholder=" " >
                            <label for="password">Hasło</label>
                        </div>
                        <div class="field">
                            <input type="password" name="checkPassword" id="chckpassword" class="inputLogin" placeholder=" ">
                            <label for="chckpassword">Potwierdź hasło</label>
                            <?php
                                if(isset($_GET['invalidPasswd']))
                                {
                                    echo "<span style='color: red'>Hasła nie są takie same!</span>";
                                }
                            ?>
                        </div>
                        <input type="text" name="token" value="<?php echo $_SESSION['token'];?>" hidden>
                        <input type="submit" name="submitSub" class="button-29" value="Zarejestruj się">
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
</html>
<script src="gsap-button-animation.js"></script>
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
