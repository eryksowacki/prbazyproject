<nav class="navbar-expand-lg navbar-nav bg-dark navbar-inverse navbar-fixed-top transparent">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trenerzy.php">Trenerzy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="regulamin.php">Regulamin</a>
                </li>
                <?php
                    if(isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
                    {
                        echo <<< DROPDOWNUSER
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggler" href="mojekonto.php" id="navbarDropdown" aria-expanded="false">Moje konto</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                    <li>
                                        <a class="dropdown-item" href="mojekonto.php?calendar">Kalendarz treningów</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item">Moje Siłownie</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="mojeoferty.php">Moje Oferty</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="Scripts/PHP/logout.inc.php">Wyloguj mnie</a>
                                    </li>
                                </ul>
                            </li>
DROPDOWNUSER;
                    }
                ?>      
                <li class="nav-item btn-group dropend dropdown-menu-right">
                    <button class="nav-link dropdown-toggle" id="nvbrdrpdwn" role="button" data-bs-toggle="dropdown-right" aria-expanded="false">Wyszukaj</button>
                    <div class="search">
                        <form class="d-flex" method="post" action="chujwie.php">
                            <input class="form-control me-2" type="search" id="search-bar" disabled placeholder="Szukaj siłowni lub trenerów..." aria-label="Search">
                            <div class="btn-search-bar">
                                <input class="btn btn-outline-success" id="search-button" type="submit">
                            </div>
                        </form>
                    </div>
                </li>
               <?php
                    if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
                    {
                        echo <<< REGISTER
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Zarejestruj się</a>
                            </li>
REGISTER;
                        if(strpos($_SERVER['REQUEST_URI'], "login.php") != 0)
                        {
                            // dfnjawo
                        }
                        else
                        {
                            echo <<< NAVLOGIN
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle dropdown-toggler" href="login.php" id="navbarDropdown" aria-expanded="false">Zaloguj się </a>
                                    <ul class="dropdown-menu dropdown-quicklog" aria-labelledby="navbarDropdown">
                                        <form action="Scripts\PHP\login.inc.php" method="post">    
                                            <li>
                                                <div class="field">
                                                <input type="email" name="email" id="email" class="navUserInput" placeholder=" " autocompleate='off'>
                                                <label for="email" class="floating-label-ql">Email</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="field">
                                                <input type="password" name="password" id="password" class="navUserInput" placeholder=" " autocompleate='on'>
                                                <label for="password" class="floating-label-ql">Hasło</label>
                                                </div>
                                            </li>
                                            <li>
                                                <input type="submit" value="Prześlij">
                                            </li>
                                        </form>
                                    </ul>
                                </li>
NAVLOGIN;
                        }
                    }
<<<<<<< HEAD
=======
                ?>
            <?php
>>>>>>> bsBranch
                if(isset($_SESSION['user_id']))
                {
                    echo "</ul>";
                    echo <<< SESSION
                        <li class="nav-item sessionInfo">
                            <a class="nav-link linkSession" href="mojekonto.php?accountPer">Witaj $_SESSION[name]</a>
                            
SESSION;
                    if($_SESSION['profile_picture'] != NULL)
                    {
                        echo "<img class='userPfp' src='Images\USER IMAGES/$_SESSION[profile_picture]' alt='Zdjęcie profilowe'></li>";
                    }
                    else
                    {
                        echo "</li>";
                    }
                }
            ?>
        </div>
    </div>
</nav>