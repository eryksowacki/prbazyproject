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

            if($connect -> connect_errno)
            {
                echo "Błędne połączenie z bazą danych";
            }
            else
            {
                $sql = "SELECT DISTINCT `name`, `surname`, `prize_per_hour`, `profile_picture`, `specialization`, `gym_name` FROM `trainer_reviews` inner join `trainers` on `trainer_reviews`.`trainer_id`=`trainers`.`trainer_review_id` inner join `gyms` on `trainers`.`gym_id`=`gyms`.`gym_id` where `gym_name` like '$_POST[gymName]' and `city` like '$_POST[city]' and `trainer_mark` in($_POST[minTrainerMark],$_POST[maxTrainerMark]) and `prize_per_hour` between $_POST[minPrize] and $_POST[maxPrize]";

                $result = $connect -> query($sql);

                while($trainer = $result -> fetch_assoc())
                {
                    echo <<< TRAINER
                    <div>
                        Imię i nazwisko: $trainer[name] $trainer[surname] <br> <br>
                        <img src="../Images/TRAINERS IMAGES/$trainer[profile_picture]" alt="trainer"> <br> <br>
                        Specjalizacja: $trainer[specialization] <br> <br>
                        Siłownia: $trainer[gym_name] <br> <br>
                        Cena za godzinę: $trainer[prize_per_hour] <br> <br>
                    </div>
TRAINER;
                }                
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