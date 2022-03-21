<?php
	session_start();
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

        $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
        $sql = "SELECT `specialization`, count(`specialization`) as `number_of_trainers`, `city`, `gym_name`
                FROM `trainers`
                JOIN `gyms`
                ON `trainers`.`gym_id` = `gyms`.`gym_id`
                GROUP BY `specialization`";
        $result = $connect -> query($sql);
        echo "<div class='trainerSearch'><form action='trainers.php' class='trainerSearchForm' method='get'><p>Specjalizacja: <select name='specialization'><option></option>";
        while ($currRow = $result -> fetch_assoc()) 
        {
            echo "<option value='$currRow[specialization]'>$currRow[specialization] ($currRow[number_of_trainers])</option>";
        }
        echo "</select></p>";
        $result = $connect -> query($sql);
        echo "<p>Miasto: <select name='city'><option></option>";
        while ($currRow = $result -> fetch_assoc()) 
        {
            echo "<option value=".$currRow["city"].">$currRow[city]</option>";
        }
        echo "</p></select>";
        echo "<p class='sort'>Sortuj według ceny: <div style='display:inline-flex'><p><input type='radio' name='prize' value='ASC'>Rosnąco</p><p><input type='radio' name='prize' value='DESC'>Malejąco</p></div></p>";
        
        
        echo "<input type='submit' value='Wyszukaj'></form></div>";
        
        $limiter = 0;
        if(isset($_GET['limiter']))
        {
            $limiter += (int) $_GET['limiter'];
        }
        else
        {
            $_GET['limiter'] = 0;
        }
        $limiter *= 16;
        if(isset($_GET['prize']) && !empty($_GET['prize']))
        {
            $order = "`prize_per_hour` \"$_GET[prize]\"";
        }
        else
        {
            $order = '`trainer_id` ASC';
        }
        if(isset($_GET['specialization']) && !empty($_GET['specialization']))
        {
            $where = "`specialization` LIKE \"$_GET[specialization]\"";
        }
        else
        {
            $where = "1 = 1";
        }
        if(isset($_GET['city']) && !empty($_GET['city']) && empty($_GET['specialization']))
        {
            $where = "`city` LIKE \"$_GET[city]\"";   
        }
        if(isset($_GET['city']) && !empty($_GET['city']) && (isset($_GET['specialization']) && !empty($_GET['specialization'])))
        {
            $where .= " AND `city` LIKE \"$_GET[city]\"";
            $trainerQuery = "SELECT `trainer_id`,`specialization`, `email`, `password`, `trainers`.`gym_id`, `name`, `surname`, `prize_per_hour`, `profile_picture`, `trainer_descript`
                FROM `trainers`
                JOIN `gyms`
                ON `trainers`.`gym_id` = `gyms`.`gym_id` 
                WHERE `specialization` LIKE :spec AND `city` LIKE :city ORDER BY :ordero LIMIT :limiter, 16";
                $data = [
                    "spec" => $_GET["specialization"],
                    "city" => $_GET["city"],
                    "ordero" => $order,
                    "limiter" => $limiter,
                ];
        }
        try
        {
            $PDO_CONNECT = new PDO("mysql:dbname=id18439949_znanytrener;host=localhost;", "id18439949_znanytrenerusername", 'sy>[$Fo8]+!n^cVN');
            $PDO_CONNECT->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $PDO_CONNECT->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $PDO_CONNECT->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) 
        {
            $connect = null;
            header("Location: ../../trainers.php?Error=$e->getMessage()");
        }
        $sql = "SELECT count(`trainer_id`) as 'train_id'
                FROM `trainers` 
                JOIN `gyms`
                ON `trainers`.`gym_id` = `gyms`.`gym_id` 
                WHERE :wher";
        $data = ['wher' => $where];
        $stmt = $PDO_CONNECT -> prepare($sql);
        $stmt -> execute($data);
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $result = $result[0]['train_id'];
        $stoppers = round($result / 16, 5);
        echo "</div><div class='pageNumaration'><p>";
        $anchorString = "";
        unset($_GET['limiter']);
        foreach ($_GET as $key=> $value) 
        {
            $anchorString .= "&$key=$value";
        }
        for ($i=0; $i < $stoppers; $i++) 
        { 
            $tmp = $i + 1;
            echo <<< RESTOF
                <span><a href="trainers.php?limiter=$i$anchorString">$tmp</a></span>
        RESTOF;
        }
        echo "</p></div>";

        $trainerQuery = "SELECT `trainer_id`,`specialization`, `email`, `password`, `trainers`.`gym_id`, `name`, `surname`, `prize_per_hour`, `profile_picture`, `trainer_descript`
                FROM `trainers`
                JOIN `gyms`
                ON `trainers`.`gym_id` = `gyms`.`gym_id` 
                LIMIT :limiter, 16";
        $data = [
            "limiter" => $limiter,
        ];

        echo "<div class='wholeTrainersBlock'>";
        $stmt = $PDO_CONNECT -> prepare($trainerQuery);
        $stmt -> execute($data);
        while($result = $stmt -> fetch(PDO::FETCH_ASSOC))
        {
            $avg = "SELECT round(avg(`trainer_mark`),1) * 2 FROM `trainer_reviews` WHERE `trainer_id` = $result[trainer_id]";
            $avgRev = mysqli_fetch_row($connect -> query($avg))[0];
            echo <<< TRAINER
                <div class='trainersBlock'>
                    <p><img src='Images/TRAINERS IMAGES/$result[profile_picture]' class='trainPfP'></p>
                    <p>$result[name] $result[surname]</p>
                    <p>$result[specialization]</p>
                    <p>Cena za trening: $result[prize_per_hour]</p>
                    <p>Średnia ocen trenera: $avgRev</p>
TRAINER;
            if(isset($_SESSION['user_id']) || !empty($_SESSION['user_id']))
            {
                echo <<< FOURM
                    <form action="Scripts/PHP/addTrainerToUser.php" method="post">
                        <input type="submit" value="Wybierz trenera">
                        <input type="text" name="trainer" value="$result[trainer_id]" hidden>
                    </form>
                </div>
FOURM;
            }
            else
            {
                echo "</div>";
            }
        }
        $sql = "SELECT count(`trainer_id`) as 'train_id'
                FROM `trainers` 
                JOIN `gyms`
                ON `trainers`.`gym_id` = `gyms`.`gym_id` 
                WHERE :wher";
        $data = ['wher' => $where];
        $stmt = $PDO_CONNECT -> prepare($sql);
        $stmt -> execute($data);
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $result = $result[0]['train_id'];
        $stoppers = round($result / 16, 5);
        echo "</div><div class='pageNumaration'><p>";
        $anchorString = "";
        unset($_GET['limiter']);
        foreach ($_GET as $key=> $value) 
        {
            $anchorString .= "&$key=$value";
        }
        for ($i=0; $i < $stoppers; $i++) 
        { 
            $tmp = $i + 1;
            echo <<< RESTOF
                <span><a href="trainers.php?limiter=$i$anchorString">$tmp</a></span>
        RESTOF;
        }
        echo "</p></div>";


    ?>

    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>
</html>
<script src="Scripts/JS/gsap-panels-animations.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/footer-icon-change.js" crossorigin="anonymous"></script>
