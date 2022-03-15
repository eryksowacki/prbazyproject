<?php
    session_start();
    if(!isset($_SESSION['user_id']) || !is_int($_SESSION['user_id']) || $_SESSION['user_id'] == NULL)
    {
        header('Location: Scripts/PHP/logout.inc.php');
    }
    $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
    $sql = "SELECT `weight` as `w`, `date` as `d` FROM `bmi` `b` where `bmi_id` = $_SESSION[user_id] order by `d` asc;";
    $result = $connect -> query($sql);
    echo "<script> const weight = [];const date = [];";
    $i = 0;
    while($row = $result -> fetch_assoc())
    {
        if($i == 0){
            $date = $row['d'];
        }
        echo "weight.push(".$row['w']."); date.push('".substr($row['d'], 0, 10)."');";
        $i++;
        $nextDate = $row['d'];
    }
    echo "</script>";
    

?>
<?php
    $origin = new DateTime($date);
    $target = new DateTime($nextDate);
    $interval = $origin->diff($target);
    $dayDiff =  $interval -> format('%a dni');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require_once 'Scripts/PHP/page_look_head.php';
    ?>
    <title>Moje konto</title>
</head>

<body>
    <?php
        require_once 'Scripts/PHP/navbar-content.php';
    ?>
    <div class="grid myAccount">

        <nav class="sidebar card py-2 mb-4">
            <ul class="nav flex-column">
                <li class="nav-item-menu">
                    <h2 class="nav-link">Menu</h2>
                </li>
                <li class="nav-item nav-item-list">
                    <a class="nav-link my-gyms">Moje siłownie<b class="float-end">&raquo;</b> </a>
                    <ul class="submenu dropdown-menu submenu-dropdown-frst">
                        <li><a class="nav-link link-text" id="myGyms">Siłownie</a></li>
                        <li><a class="nav-link link-text" id="myGymReviews">Recenzje siłowni</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-list">
                    <a class="nav-link my-trainers" href="#">Moi Trenerzy<b class="float-end">&raquo;</b> </a>
                    <ul class="submenu dropdown-menu submenu-dropdown-sec">
                        <li><a class="nav-link link-text" href="trainers.php">Trenerzy</a></li>
                        <li><a class="nav-link link-text expandable" id="myTrainerReviews">Recenzje trenerów</a></li>
                        <li><a class="nav-link link-text" id="myTrainingSchedule">Rozkład treningów</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link expandable" id='weightProggress'> Mój progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" >Moje BMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="accountPersonali">Personalizacja konta</a>
                </li>
            </ul>
        </nav>

        <div class="overlay">
        </div>
        <div class="addTraining">
            <form action="Scripts/PHP/addNewTraining.inc.php" method="post">
                <p class="paragraph">Data</p>
                <input type="date" name="date" id="dateInput">
                <p class="paragraph">Godzina</p>
                <input type="time" name="time" id="time" value="12:00">
                <?php
                    $myGyms = "SELECT `gym_name`,`gyms`.`gym_id` as `g_id`,`city`
                    FROM `usr_train`
                    JOIN `gyms`
                    on `usr_train`.`gym_id` = `gyms`.`gym_id`
                    WHERE `user_id` = $_SESSION[user_id]
                    GROUP by `gyms`.`gym_id` ;";
                    $result = $connect -> query($myGyms);
                    echo "<p class='paragraph'>Siłownia</p><select name=gym_id>";
                    while($option =  $result -> fetch_assoc())
                    {   
                        echo "<option value='$option[g_id]'>$option[gym_name] $option[city]</option>";
                    }
                    echo "</select>";
                    $descriptions = "SELECT `training_descript` FROM `usr_train`group by `training_descript` ORDER BY `training_descript`  ASC;";
                    $result = $connect -> query($descriptions);
                    echo "<p class='paragraph'>Opis treningiu</p><select name=descript>";
                    while ($option = $result -> fetch_assoc()) 
                    {
                        echo "<option value='$option[training_descript]'>$option[training_descript]</option>";
                    }
                    echo "</select>";
                ?>
                <input type="submit" value="Prześlij">
            </form>
        </div>
        <script>
            document.querySelector('.addTraining').style.display = 'none';
            document.querySelector('.overlay').style.display = 'none';
        </script>
        <div class="userMain">
            <div class="chart">
                <h4>Mój progress na przestrzeni <?php echo $dayDiff;?></h4>
                <div style="width: 800px; height:400px;">
                    <canvas id="myChart"></canvas>
                </div>
                <div id="addEntry">
                    <form action="Scripts\PHP\addWeightEntry.inc.php" method="post">
                        <h4 class="newWeight">Dodaj nowy wpis</h4>
                        <p class="newWeight">Moja aktualna waga (kg):</p>
                        <input type="number" name="weight" class='weightInput' id='weightValue' step="0.1" max="300" min="0" value="">
                        <input type="submit" class='weightInput' value="Prześlij">
                    </form>
                </div>
                <div class="typesContainer">
                    <select class="chartTypes" multiple>
                        <option value="line" class="horizontalOption">Liniowy</option>
                        <option value="bar" class="horizontalOption">Kolumnowy</option>
                        <option value="bubble" class="horizontalOption">Bąbelkowy</option>
                        <option value="scatter" class="horizontalOption">Ściana</option>
                    </select>
                </div>
            </div>
            
            
            <?php
                if(isset($_GET['progress']) && count($_GET) === 1)
                {
                    echo <<< CHART
                        <script>
                            const wholeChart = document.querySelector(".chart");
                            wholeChart.style.display = 'block';
                        </script> 
CHART;
                }
                else
                {
                    echo <<< CHART
                        <script>
                            const wholeChart = document.querySelector(".chart");
                            wholeChart.style.display = 'none';
                        </script>
CHART;
                }
            ?>
            
            <div class="review-block">
                <div>
                    <?php
                        $myTrainerReveiws = 
                            "SELECT `trainers`.`name` as `n`,`trainers`.`trainer_id` as `t_id`,`trainers`.`surname` as `s`,`trainer_mark`,`trainer_review_descript`, `profile_picture`,`trainer_reviews`.`review_id` as `review_ids` 
                            FROM `trainer_reviews`
                            JOIN `trainers`
                            ON `trainer_reviews`.`trainer_id` = `trainers`.`trainer_id`
                            WHERE `trainer_reviews`.`user_id` = $_SESSION[user_id]
                            GROUP BY `trainers`.`trainer_id` ";
                        $result = $connect -> query($myTrainerReveiws);
                        echo "<div style='width: fit-content;margin: 0 auto;'><h4>Dodaj recenzję swojemu trenerowi</h4><p class=myTrainers>Moi trenerzy:</p><form action=Scripts/PHP/addReview.inc.php method=post>";
                        echo "<select class=trainerSelect name=trainer_id>";
                        while($option =  $result -> fetch_assoc())
                        {
                            echo "<option value=$option[t_id]>$option[n] $option[s]</option>";
                        }
                        echo "</select>";
                        echo '<select name="mark" class="trainerSelect trainerMark">';
                        for ($i=1; $i < 6; $i++) 
                        { 
                            echo "<option value=$i >$i</option>";
                        }
                        echo "</select><input type=submit id=reviewSubmit class=button-19 value='Prześlij nową recenzję'>
                        <br><textarea name='userNewReview' cols='100' rows='10' placeholder='Tutaj możesz wpisać nową recenzję...'></textarea></form></div>";
                        $myTrainerReveiws = 
                            "SELECT `trainers`.`name` as `n`,`trainers`.`trainer_id` as `t_id`,`trainers`.`surname` as `s`,`trainer_mark`,`trainer_review_descript`, `profile_picture`,`trainer_reviews`.`review_id` as `review_ids` 
                            FROM `trainer_reviews`
                            JOIN `trainers`
                            ON `trainer_reviews`.`trainer_id` = `trainers`.`trainer_id`
                            WHERE `trainer_reviews`.`user_id` = $_SESSION[user_id]";
                        $result = $connect -> query($myTrainerReveiws);
                        while($currentRow = $result -> fetch_assoc())
                        {
                            echo <<< USERREVIEW
                                <div class='trainer-show'>
                                    <img src='Images\TRAINERS IMAGES/$currentRow[profile_picture]' class='d-flex trainer-Picture'>
                                    <p>Imię: <b class='hoverOnInfo'>$currentRow[n]</b></p>                                
                                    <p>Nazwisko: <b class='hoverOnInfo'>$currentRow[s]</b></p>
                                    <p>Ocena: <b class='hoverOnInfo'>$currentRow[trainer_mark]</b></p>
                                    <p>Twoja recezja trenera: <b class='hoverOnInfo'>$currentRow[trainer_review_descript]</b></p>
                                    <p><a href="Scripts\PHP\delete_review.inc.php?review_id=$currentRow[review_ids]">Usuń recenzję</a></p>
                                </div>
USERREVIEW;
                        }
                        if(isset($_GET['reviews']) && count($_GET) === 1)
                        {
                            echo <<< REVIEWS
                                <script>
                                    const reviewsBlock = document.querySelector('.review-block');
                                    gsap.fromTo(reviewsBlock,0.65,{y:20,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"flex"});  
                                </script> 
REVIEWS;
                        }
                        else
                        {
                            echo <<< REVIEWS
                                <script>
                                    const reviewsBlock = document.querySelector('.review-block');
                                    reviewsBlock.style.display = 'none'; 
                                </script> 
REVIEWS;
                        }
                    ?>
                </div>
            </div>

            <div class="gymReviewsBlock">
                <div>
                    <?php
                        $myGymsRev = 
                            "SELECT `user_id`, `trainer_id`, `training_date`, `training_descript`, `gyms`.`gym_id` as `asg`, `training_id`,`gym_name`,`city`
                            FROM `usr_train` 
                            JOIN `gyms`
                            ON `usr_train`.`gym_id` = `gyms`.`gym_id`
                            WHERE `usr_train`.`user_id` = $_SESSION[user_id]
                            GROUP BY `gyms`.`gym_id`";
                        $result = $connect -> query($myGymsRev);
                        echo "<div><h4>Dodaj recenzję swojej siłowni</h4><p class=myTrainers>Moi trenerzy:</p><form action=Scripts/PHP/addGymReview.inc.php method=post>";
                        echo "<select class=trainerSelect name=gym_id>";
                        while($option =  $result -> fetch_assoc())
                        {
                            echo "<option value=$option[asg]>$option[gym_name] $option[city]</option>";
                        }
                        echo "</select>";
                        echo '<select name="mark" class="trainerSelect trainerMark">';
                        for ($i=1; $i < 6; $i++) 
                        { 
                            echo "<option value=$i >$i</option>";
                        }
                        echo "</select><input type=submit id=reviewSubmit class=button-19 value='Prześlij nową recenzję'>
                        <br><textarea name='userNewReview' cols='100' rows='10' placeholder='Tutaj możesz wpisać nową recenzję...'></textarea></form></div>";
                        $myGymsRev = 
                            "SELECT  `gym_mark`, `gym_review_descript`, `gym_reviews`.`user_id` as `user_id`, `gym_review_id` ,`gym_name`,`city`
                            FROM `gym_reviews` 
                            JOIN `users`
                            ON `gym_reviews`.`user_id` = `users`.`user_id`
                            JOIN `gyms`
                            ON `gym_reviews`.`gym_id` = `gyms`.`gym_id`
                            WHERE `users`.`user_id` = $_SESSION[user_id]";
                        $result = $connect -> query($myGymsRev);
                        while($currentRow = $result -> fetch_assoc())
                        {
                            echo <<< USERREVIEW
                                <div class='trainer-show'>
                                    <p>Ocena: <b class='hoverOnInfo'>$currentRow[gym_mark]</b></p>
                                    <p>Twoja recezja trenera: <b class='hoverOnInfo'>$currentRow[gym_review_descript]</b></p>
                                    <p><a href="Scripts\PHP\delete_gym_review.inc.php?review_id=$currentRow[gym_review_id]">Usuń recenzję</a></p>
                                </div>
USERREVIEW;
                        }
                        if(isset($_GET['gym_reviews']) && count($_GET) === 1)
                        {
                            echo <<< REVIEWS
                                <script>
                                    const gymReviewsBlock = document.querySelector('.gymReviewsBlock');
                                    gsap.fromTo(gymReviewsBlock,0.65,{y:20,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"flex"});  
                                </script> 
REVIEWS;
                        }
                        else
                        {
                            echo <<< REVIEWS
                                <script>
                                    const gymReviewsBlock = document.querySelector('.gymReviewsBlock');
                                    gymReviewsBlock.style.display = 'none';
                                </script> 
REVIEWS;
                        }
                    ?>
                </div>
            </div>                
            <div class="personalInfo">
                <?php
                    $query = "SELECT `user_id`, `profile_picture`, `email`, `password`, `name`, `surname`, `age`, `bmi_id` 
                    FROM `users` 
                    WHERE `user_id` = $_SESSION[user_id]";
                    $result =  mysqli_query($connect,$query);
                    $tab = [];
                    $row = mysqli_fetch_row($result);
                ?>
                <div>
                    <?php
                        if(!empty($row[1])){ echo "<img src='Images/USER IMAGES/$row[1]'>";};
                    ?>
                    
                    <form action="Scripts/PHP/changePFP.inc.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" id="">
                        <input type="submit" name="submit" >
                    </form>
                </div>
                <div>
                    <form action="Scripts/PHP/changeEmail.inc.php" method="post">
                        <input type="email" name="" id="" placeholder="<?php echo $row[2];?>">
                        <input type="submit" value="">
                    </form>
                </div>
                <div>
                    <form action="Scripts/PHP/change.inc.php">
                        <input type="text" name="" id="">
                        <input type="submit" value="">
                    </form>
                </div>
                <div>

            </div>
                
                
                
            </div>
            <?php
                if(isset($_GET['personalInfo']) || isset($_GET['imgSize']))
                {
                    echo <<< REVIEWS
                        <script>
                            const personalInfo = document.querySelector('.personalInfo');
                            gsap.fromTo(personalInfo,0.65,{y:20,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"flex"});  
                        </script> 
REVIEWS;
                }
                else
                {
                    echo <<< REVIEWS
                        <script>
                            const personalInfo = document.querySelector('.personalInfo');
                            personalInfo.style.display = 'none';
                        </script> 
REVIEWS;
                }
            ?>
            
            <div class="mySchedual">
                <h4>Mój rozkład treningów</h4>
                <?php
                if(isset($_GET['calendar']) && count($_GET) === 1) 
                {
                    echo <<< CALENDAR
                        <script>
                            const mySchedual = document.querySelector('.mySchedual');
                            gsap.to(mySchedual,0.65,{y:30,autoAlpha:1,display:"block"});
                        </script>    
CALENDAR; 
                }
                else
                {
                    echo <<< CALENDAR
                        <script>
                            const mySchedual = document.querySelector('.mySchedual');
                            mySchedual.style.display = 'none';
                        </script>    
CALENDAR;
                }
                ?>
                
                <div class="gridInGrid">
                    <?php
                        date_default_timezone_set("Europe/Warsaw");
                        $d = date("Y-m-01");
                        $howLong = date("d",strtotime(date("Y-m-t",  strtotime($d))));
                        $currDay = date("Y-m-d");
                        $sql = "SELECT `trainer_id`,date(`training_date`) as `date`,`training_descript`,`gym_id` 
                                FROM `usr_train` 
                                WHERE `user_id` = $_SESSION[user_id];";
                        
                        $result = $connect -> query($sql);
                        $assoc= array();
                        $dzien_tyg_pl = array('Monday' => 'Poniedziałek',
                        'Tuesday' => 'Wtorek', 
                        'Wednesday' => 'Środa', 
                        'Thursday' => 'Czwartek', 
                        'Friday' => 'Piątek', 
                        'Saturday' => 'Sobota', 
                        'Sunday' => 'Niedziela');
                        $sql = "SELECT `trainer_id`,date(`training_date`) as `date`,`training_descript`,`gym_id` 
                        FROM `usr_train` 
                        WHERE `user_id` = $_SESSION[user_id];";
                        echo "<script>const amountDays = $howLong</script>";
                        for ($i=-1; $i < $howLong + 3 ; $i++) 
                        { 
                            $p = $i+1;
                            $f = date("Y-m-d",strtotime("+$p day", strtotime($d)));
                            echo "<div class='calendar'>";
                            $dzien_tyg = date("l",strtotime("+$i day", strtotime($d)));
                            echo "<b>$f</b><b>$dzien_tyg_pl[$dzien_tyg]</b>";
                        
                            $tmp = 0;
                            $result = $connect -> query($sql);

                            while($row = $result -> fetch_assoc())
                            {   
                                if($row['date'] === $f)
                                {
                                    echo "<h4 class=treningType>Typ treningu: <p class=trainingDesc>$row[training_descript]</p></h4>";
                                }
                                else
                                {
                                    $tmp++;
                                }
                                array_push($assoc,$row['date']);
                            }
                            if($tmp == count($assoc)){

                                echo "<p class=freeDay>Dzień wolny</p>";
                                $assoc = [];
                            }
                            else
                            {
                                $assoc = [];
                            }
                            echo "</div>";
                            if(date("Y-m-d",strtotime($f)) == $currDay)
                            {
                                $aposgh = date('d',strtotime($currDay));
                                $aposgh += 1;
                                echo "<script>const curDay = document.querySelector('.mySchedual > div > div:nth-child($aposgh)');
                                curDay.style.backgroundColor = '#045de9';
                                curDay.style.backgroundImage = 'linear-gradient(315deg, #045de9 0%, #09c6f9 74%)';</script>";
                            }
                            
                        }
                        echo "<script src='Scripts\JS\checkUserWidth.js' crossorigin='anonymous'></script>";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once 'Scripts/PHP/page_look_footer.php';
    ?>
</body>

</html>
<?php
    if(isset($_GET['calendar']) && count($_GET) === 1) 
    {
        echo "<script src='Scripts/JS/gsap-effortless-calendar-animation.js'></script>";
    }
?>

<script src="Scripts/JS/nav-link.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/chartApp.js" crossorigin="anonymous"></script>
<script>
    function changeChartSwitch(switcher)
    {
        switch (switcher) {
            case "line":
                change("line");
                break;
            case "bar":
                change("bar");
                break;
            case "bubble":
                change("bubble");
                break;
            case "scatter":
                change("scatter");
                break;
            default:
                change("line");
                break;    
        }
    }
    $(".chartTypes > option").on("dblclick", function() {
        changeChartSwitch(document.querySelector(".chartTypes").value);
    });
    function change(newType) 
    {
        let canvas = document.getElementById("myChart").getContext("2d");
        if(myChart instanceof Chart) 
        {
            myChart.destroy();
        }

        if(newType == 'scatter')
        {
            userProgressChart.options.scales.y.min = 0; 
        }
        else
        {
            userProgressChart.options.scales.y.min = Math.min(weight);
        }
        let temp = jQuery.extend(true, {}, userProgressChart);
        temp.type = newType;
        myChart = new Chart(canvas, temp);
    }
    function getCookie(cname) 
    {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) 
        {
            let c = ca[i];
            while (c.charAt(0) == ' ') 
            {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) 
            {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    const cookieChartChange = getCookie('favChart');
    changeChartSwitch(cookieChartChange)
    
    
    
</script>

<script>
    const dayBlock = document.querySelectorAll(".calendar > b");
    const calendarBlock = document.querySelectorAll(".calendar");
    const freeDay = document.querySelectorAll(".freeDay");
    const training = document.querySelector('.addTraining');
    const overlay = document.querySelector('.overlay');

    for (let i = 0; i < amountDays; i++) 
    {
        $(freeDay[i]).on('click', function()
        {
            let dayOfNewTraining  = freeDay[i].previousElementSibling.previousElementSibling.outerText.substring(0,10);
            console.log(dayOfNewTraining);
            gsap.to(training,0.55,{autoAlpha:1,display:'block',zIndex:99});
            gsap.to(overlay,0.55,{autoAlpha:1,display:'block',zIndex:99});

            $(overlay).on('click',function(e)
            {   
                if(training.contains(e.target))
                {
                    console.log(dayOfNewTraining);
                } 
                else
                {
                    gsap.to(training,0.55,{autoAlpha:0,display:'none'});
                    gsap.to(overlay,0.55,{autoAlpha:0,display:'none'});
                }
            });
            document.querySelector("#dateInput").value = dayOfNewTraining;

            
        });
        
    }
    
</script>
<script src="Scripts/JS/gsap-myaccount-animations.js" crossorigin="anonymous"></script>
