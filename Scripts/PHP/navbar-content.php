<!-- <?php print_r($_SESSION); ?> -->
<nav class="navbar-expand-lg navbar-nav bg-dark navbar-inverse navbar-fixed-top transparent">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Trenerzy.php">Trenerzy</a>
                </li>
                <?php
                    if(isset($_SESSION['user_id']))
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
                                        <a class="dropdown-item" href="..\Scripts\PHP\logout.php">Wyloguj mnie</a>
                                    </li>
                                </ul>
                            </li>
                        DROPDOWNUSER;
                    }
                    else
                    {
                        echo <<< REGISTER
                            <li class="nav-item">
                                <a class="nav-link" href="Login.php">Zaloguj się</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Zarejestruj się</a>
                            </li>
                        REGISTER;
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="Regulamin.php">Regulamin</a>
                </li>
                <li class="nav-item btn-group dropend dropdown-menu-right dupa">
                    <button class="nav-link dropdown-toggle" id="nvbrdrpdwn" role="button" data-bs-toggle="dropdown-right" aria-expanded="false">Wyszukaj</button>
                    <div class="search">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" id="search-bar" disabled placeholder="Szukaj siłowni lub trenerów..." aria-label="Search">
                            <div class="btn-search-bar">
                                <button class="btn btn-outline-success" type="submit">Szukaj</button>
                            </div>
                        </form>
                    </div>
                </li>
                </ul>

            <?php
                if(isset($_SESSION['user_id']))
                {
                    echo <<<SESSION
                        <li class="nav-item sessionInfo">
                            <a class="nav-link linkSession" href="mojekonto.php?accountPer">Witaj $_SESSION[name]</a>
                            
                    SESSION;
                    if($_SESSION['profile_picture'] != NULL)
                    {
                        echo "<img class='userPfp' src='..\Images\USER IMAGES/$_SESSION[profile_picture]' alt='cipaXDDDDDDDDDDD'></li>";
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
