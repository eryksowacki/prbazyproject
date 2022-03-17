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
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>
</html>
<script src="Scripts/JS/progressionBarApp.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-panels-animations.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/footer-icon-change.js" crossorigin="anonymous"></script>
