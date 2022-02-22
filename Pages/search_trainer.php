<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require_once '..\Scripts\PHP\page_look_head.php';
    ?>
    <title>Wyszukiwani trenerzy</title>
</head>
<body>
    <?php
        require_once '..\Scripts\PHP\navbar-content.php';
    ?>
    <div id="content" class="d-flex justify-content-center">
        <h2>Trenerzy personalni</h2>
        <?php
            require_once '../Scripts/PHP/connect_user.php';

            if($connect -> connect_ernno)
            {
                echo "Błędne połączenie z bazą danych";
            }
            else
            {
                $gymName = $_POST['gymName'];
                $city = $_POST['city'];
                $trainerSex = $_POST['trainerSex'];
                TODO:$trainerSpec = $_POST['specialization'];
                $minMark = $_POST['minTrainerMark'];
                $maxMark = $_POST['maxTrainerMark'];
                $minPrize = $_POST['minPrize'];
                $maxPrize = $_POST['maxPrize'];

                $sql = "SELECT * FROM `trainers` where `` like $gymName and `` like $city and `` like $trainerSex and `` between $minMark and $maxMark and `` between $minPrize and $maxPrize";
            }
        ?>
    </div>
    <footer id="footer">
        <?php
            require_once '..\Scripts\PHP\page_look_footer.php';
        ?>
    </footer>
</body>
    <?php
        require_once '..\Scripts\PHP\page_look_scripts.php';
    ?>
</html>