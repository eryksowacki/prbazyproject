<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="shortcut icon" href="../Images/WEBSITE IMAGES/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="../Scripts/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../Scripts/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Znany trener</title>
</head>
<body>
    <div id="progress-bar"></div>
    <!-- <nav class="navbar navbar-light bg-dark">
            <div class="container" >
                <a href="index.php">
                    <img src="../Images/WEBSITE IMAGES/LOGO.png" alt="zdjęcie loga znany trener" id="logoImage">
                </a>
                <input type="text" name="" id="">
            </div>
        </nav>
        <div>
    </nav> -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../Images/WEBSITE IMAGES/carouserl-img1.png" alt="Gym promotion imgage. Females deadlifting barbells">
          <div class="carousel-caption d-none d-md-block">
            <h5>Zadbaj o swoją forme</h5>
            <p>Z naszymi trenerami możesz osiągnąć wszystko!</p>
          </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../Images/WEBSITE IMAGES/carouserl-img2.png" alt="Gym promotion imgage. Gym preview">
            <div class="carousel-caption d-none d-md-block">
              <h5>Odwiedzaj nowe siłownie!</h5>
              <p>I znajdź tą najbardziej sprzyjającą Tobie</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../Images/WEBSITE IMAGES/carouserl-img3.png" alt="Gym promotion imgage. Guy deadlifting">
            <div class="carousel-caption d-none d-md-block">
                <h5>Daj z siebie 101%</h5>
                <p>Każda przygoda zaczyna się od chęci.</p>
            </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>

    <div id="page" class="whole-page">
        <div id="login">
            <form action="../Scripts/login.inc.php" method="post">
                Login: <input type="text" name="login">
                Hasło: <input type="password" name="password">
                <input type="submit" name="submitSub" value="Zaloguj się">   
            </form>
            <a href="signup.php">Nie masz konta? Zarejestruj się!</a>
        </div>
        <div id="content" class="d-flex justify-content-center">
            <h2>Szukaj trenera personalnego</h2>
            <form action="index.php" method="post" class="d-flex">
                <h4>Miasto:</h4>
                <input type="text" placeholder="Np. Poznań" name="city">
                <h4>Nazwa siłowni:</h4>
                <input type="text" placeholder="Np. Fabryka Formy" name="gymName">
                <h4>Płeć trenera:</h4>
                <select name="trainerSex">
                    <option value="woman">Kobieta</option>
                    <option value="man">Mężczyzna</option>
                </select>
                <h4>Ocena:</h4>
                <input type="text" placeholder="od:" name="minTrainerMark">
                <input type="text" placeholder="do:" name="maxTrainerMark">
                <h4>Cena:</h4>
                <input type="text" placeholder="od" name="minPrize"> 
                <input type="text" placeholder="do:" name="maxPrize">
                <input type="submit" value="Szukaj">
            </form>
        </div>
    </div>
    <footer id="footer">
        <span id="footerText">Projekt Aplikacje/Bazy <i>Eryk Sowacki & <a href="https://github.com/Wichtowski">Oskar Wichtowski</a></i></span>
    </footer>
</body>
<script src="../Scripts/progressionBarApp.js"></script>
<script src="../Scripts/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</html>
