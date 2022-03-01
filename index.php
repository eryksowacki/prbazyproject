<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<?php
        require_once "Scripts/PHP/page_look_head.php";
    ?>
    <title>Znany trener</title>
</head>
<body>
	<?php
		require_once 'Scripts\PHP\navbar-content.php';
	?>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="Images/WEBSITE IMAGES/carouserl-img1.png" alt="Obraz promocyjny siłowni. Kobiety robią martwy ciąg">
				<div class="carousel-caption d-none d-md-block">
					<h5>Zadbaj o swoją forme</h5>
					<p>Z naszymi trenerami możesz osiągnąć wszystko!</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="Images/WEBSITE IMAGES/carouserl-img2.png" alt="Obraz promocyjny siłowni. Podgląd siłowni">
				<div class="carousel-caption d-none d-md-block">
					<h5>Odwiedzaj nowe siłownie!</h5>
					<p>I znajdź tą najbardziej sprzyjającą Tobie</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="Images/WEBSITE IMAGES/carouserl-img3.png" alt="Obraz promocyjny siłowni. Facet martwy ciąg">
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
	<div id="progress-bar"></div>
	
    <div id="page" class="whole-page">
        <!-- <div id="login">
            <form action="Scripts/PHP/login.inc.php" method="post">
                Login: <input type="text" name="login">
                Hasło: <input type="password" name="password">
                <input type="submit" name="submitSub" value="Zaloguj się">   
            </form>
            <a href="signup.php">Nie masz konta? Zarejestruj się!</a>
        </div>
        <div id="content" class="d-flex justify-content-center"> -->
            <!-- <h2>Szukaj trenera personalnego</h2>
            <form action="index.php" method="post" class="d-flex">
                <h4>Miasto:</h4>
				<select name="gymName">
					<?php
						// $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
						// $gymQuery = "SELECT DISTINCT `gym_name` FROM `gyms` ORDER BY `gym_id` ASC";
						// $result = $connect -> query($gymQuery);
						// while($currentRow =  mysqli_fetch_row($result))
						// {
						// 	echo "<option value='$currentRow[0]'>$currentRow[0]</option>";
						// }
					?>
				</select>
				<select name="city">
					<?php
						// $cityQuery = "SELECT DISTINCT `city` FROM `gyms` ORDER BY `gym_id` ASC";
						// $result = $connect -> query($cityQuery);
						// while($currentRow =  mysqli_fetch_row($result))
						// {
						// 	echo "<option value='$currentRow[0]'>$currentRow[0]</option>";
						// }
					?>
				</select>
                <h4>Płeć trenera:</h4>
                <select name="trainerSex">
                    <option value="female">Kobieta</option>
                    <option value="male">Mężczyzna</option>
                </select>
                <h4>Ocena:</h4>
                <input type="text" placeholder="od:" name="minTrainerMark">
                <input type="text" placeholder="do:" name="maxTrainerMark">
                <h4>Cena:</h4>
                <input type="text" placeholder="od" name="minPrize"> 
                <input type="text" placeholder="do:" name="maxPrize">
                <input type="submit" value="Szukaj">
            </form>
        </div> -->
		<div class="imagePanelLeft">
			<img src="" alt="" >
		</div>
    </div> 
    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>
</html>
<script src="Scripts/JS/progressionBarApp.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
