<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a href="index.php"><img src="../Images/WEBSITE IMAGES/LOGO.png" alt="zdjęcie loga znany trener" id="logoImage"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Szukaj siłowni lub trenerów..." aria-label="Search">
                    <div class="btn-search-bar">
                        <button class="btn btn-outline-success" type="submit">Szukaj</button>
                    </div>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Trenerzy.php">Trenerzy</a>
                    </li>
                    <?php
                        if(!empty($_SESSION['user_id']))
                        {
                            echo <<< DROPDOWNUSER
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Moje konto</a>
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
                </ul>
            </div>
        </div>
    </nav>