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
                    <?php
                        $_SESSION['user_id'] = 1;
                        if(!empty($_SESSION['user_id']))
                        {
                            echo <<< DROPDOWNUSER
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="mojekonto.php" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">Moje konto</a>
                                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="mojekonto.php#myTrainers">Moi Trenerzy</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="mojekonto.php#myGyms">Moje Siłownie</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="mojeoferty.php">Moje Oferty</a>
                                        </li>
                                    </ul>
                                </li>
                            DROPDOWNUSER;
                        }
                        else
                        {
                            echo <<< REGISTER
                                <li class="nav-item">
                                    <a class="nav-link" href="signup.php">Zarejestruj się</a>
                                </li>
                            REGISTER;
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Regulamin.php">Regulamin</a>
                    </li>
                    <li class="nav-item btn-group dropend dropdown-menu-right" >
                        <button class="nav-link dropdown-toggle" id="nvbrdrpdwn" role="button" data-bs-toggle="dropdown-right" aria-expanded="false">Wyszukaj</button>
                    </li>
                </ul>
                <div class="search">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Szukaj siłowni lub trenerów..." aria-label="Search">
                        <div class="btn-search-bar">
                            <button class="btn btn-outline-success" type="submit">Szukaj</button>
                        </div>
                    </form>
                </div>
                <div id="login">
                    <form action="..\Scripts\PHP\login.inc.php" method="post">
                        E-mail: <input type="text" name="login">
                        Hasło: <input type="password" name="password">
                        <input type="submit" name="submitSub" value="Zaloguj się">   
                    </form>
                    <a href="signup.php">Nie masz konta? Zarejestruj się!</a>
                </div>
            </div>
        </div>
    </nav>
