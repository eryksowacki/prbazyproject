<?php
	session_start();
	if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
    {
        // header('Location: Scripts/PHP/logout.inc.php');
    }
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
	<script>
		tl.fromTo("#carouselExampleCaptions",0.5,{y:30,opacity:0,autoAlpha:0},{y:0,opacity:1,autoAlpha:1});
	</script>
	
    <div id="page" class="whole-page">
		<div class="trainingPromotionPanel">
			<div class="panelControl piss">
				<div class="replace">
					<h3>Przyjazna kadra trenerska</h3>
					<p>Popraw wytrzymałość, kondycję i zdolność do regeneracji dzięki najwyższej jakości sprzętowi jak bieżnie, orbitreki, steppery czy ergometry.</p>
				</div>
				<button class="panelButton">Przyjazna kadra trenerska</button>
				<img src="Images/WEBSITE IMAGES/enterGymWorld.png" class="panelImage" alt="">
			</div>
			<div class="panelControl piss">
				<div class="replace">
					<h3>Maszyny</h3>
					<p>Trenuj wszystkie partie mięśniowe korzystając z różnych typów maszyn najlepszej jakości.</p>
				</div>
				<button class="panelButton">Maszyny</button>
				<img src="Images/WEBSITE IMAGES/mashinka.png" class="panelImage" alt="">
			</div>
			<div class="panelControl piss">
				<div class="replace">
					<h3>Wolne ciężary</h3>
					<p>Uwolnij energię i popraw siłę dzięki hantlom, sztangom i wielu wariantom ćwiczeń na ławkach.</p>
				</div>
				<button class="panelButton">Wolne ciężary</button>
				<img src="Images/WEBSITE IMAGES/deadlifting.png" class="panelImage" alt="">
			</div>
			<div class="panelControl piss">
				<div class="replace">
					<h3>Zajęcia fitness w grupie</h3>
					<p>Szlifuj formę z najlepszymi trenerami, poczuj autentyczną motywację i dynamikę w grupie.</p>
				</div>
				<button class="panelButton">Zajęcia fitness w grupie</button>
				<img src="Images/WEBSITE IMAGES/groupWorkout.png" class="panelImage" alt="">
			</div>
		</div>
		<div class="trainersPresentation">
			<h1>Najbardziej cenieni przez was trenerzy</h1>
			<div class="izsdfghosazd">
			<?php
				$connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
				$query = "SELECT `name`,`surname`,`specialization`,`profile_picture`,`gym_name`,`city` ,round(avg(`trainer_mark`),2) * 2 as `average_mark`, count(`review_id`) as `numberof_review`, `trainer_descript`
				FROM `trainer_reviews`
				JOIN `trainers`
				ON `trainer_reviews`.`trainer_id` = `trainers`.`trainer_id`
				JOIN `gyms`
				ON `trainers`.`gym_id` = `gyms`.`gym_id`
				GROUP BY `trainers`.`trainer_id`
				ORDER BY  `numberof_review` DESC, `average_mark` DESC LIMIT 6";
				$result = $connect -> query($query);
				while($currRow = $result -> fetch_assoc())
				{
					echo <<< TRAINERS
						<div class="trainerBlock">
							<div>
								<img src='Images/TRAINERS IMAGES/$currRow[profile_picture]' class='trainerPfP' title='Zdjęcie profilowe trenera: $currRow[name]' alt='Zdjęcie profilowe trenera: $currRow[name]'>
							</div>
							<div class="ldusb">
								<span>Średnia ocena użytkowników: <p>$currRow[average_mark]</p></span>
							</div>
							<div class="ldusb">
								<span>$currRow[name] $currRow[surname]</span>
							</div>
							<div class="ldusb">
								<p>Specjalizacja: $currRow[specialization]</p>
							</div>
							<div class="ldusb">
								<p class="smallPar">$currRow[trainer_descript]</p>
							</div>
						</div>
TRAINERS;
				}
			?>
			</div>
		</div>
    </div> 

    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>
</html>
<script src="Scripts/JS/progressionBarApp.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-panels-animations.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/footer-icon-change.js" crossorigin="anonymous"></script>
