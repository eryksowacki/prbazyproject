<?php
	session_start();
	if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
    {
        header('Location: Scripts/PHP/logout.inc.php');
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<?php
        require_once "Scripts/PHP/page_look_head.php";
    ?>
    <title>Znani trenerzy</title>
</head>
<body>
	<?php
		require_once 'Scripts\PHP\navbar-content.php';
	?>	

    <?php
        $limiter = 0;
        if(isset($_GET['limiter']))
        {
            $limiter += $_GET['limiter'];
        }
        else
        {
            $_GET['limiter'] = 0;
        }
        $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
        $sql = "SELECT `trainer_id`,`specialization`, `email`, `password`, `gym_id`, `name`, `surname`, `prize_per_hour`, `profile_picture`, `trainer_descript`
                FROM `trainers`
                limit $limiter, 16";
        $result = $connect -> query($sql);

        echo "<div class='wholeTrainersBlock'>";
        while($currRow = $result -> fetch_assoc())
        {
            $avg = "SELECT round(avg(`trainer_mark`),2) FROM `trainer_reviews` WHERE `trainer_id` = $currRow[trainer_id]";
            $avgRev = mysqli_fetch_row($connect -> query($avg))[0];
            echo <<< TRAINER
                <div class='trainersBlock'>
                    <p><img src='Images/TRAINERS IMAGES/$currRow[profile_picture]' class='trainPfP'></p>
                    <p>$currRow[name] $currRow[surname]</p>
                    <p>$currRow[specialization]</p>
                    <p>Cena za trening: $currRow[prize_per_hour]</p>
                    <p>Średnia ocen trenera: $avgRev</p>
                </div>
TRAINER;
        }
        echo "</div>";

    ?>


    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>
</html>
<script src="Scripts/JS/gsap-panels-animations.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/footer-icon-change.js" crossorigin="anonymous"></script>
