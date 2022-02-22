<!DOCTYPE html>
<?php
    session_start();
    require_once '..\Scripts\PHP\connect_user.php';
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
<html lang="pl">
<head>
    <link rel="stylesheet" href="..\Scripts\CSS\bootstrap-5.0.2-dist\css\bootstrap.css">
    <link rel="stylesheet" href="..\Scripts\CSS\style.css">
    <script src="..\Scripts\JS\bootstrap-5.0.2-dist\js\bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="..\Scripts\node_modules\jquery\dist\jquery.min.js" crossorigin="anonymous"></script>
    <script src="..\Scripts\node_modules\chart.js\dist\chart.min.js" crossorigin="anonymous"></script>
    <script src="..\Scripts\node_modules\gsap\dist\gsap.min.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="..\Images\WEBSITE IMAGES\LOGO.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje konto</title>
</head>

<body>
    <?php
        require_once('..\Scripts\PHP\navbar-content.php');
    ?>
    <div class="grid myAccount">

        <nav class="sidebar card py-2 mb-4">
            <ul class="nav flex-column">
                <li class="nav-item-menu">
                    <h2 class="nav-link">Menu</h2>
                </li>
                <li class="nav-item nav-item-list">
                    <a class="nav-link my-gyms" href="#myGyms">Moje siłownie<b class="float-end">&raquo;</b> </a>
                    <ul class="submenu dropdown-menu submenu-dropdown-frst">
                        <li><a class="nav-link link-text" href="#myGyms">Siłownie</a></li>
                        <li><a class="nav-link link-text" href="#">Recenzje siłowni</a></li>
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
                    <a class="nav-link">Personalizacja konta</a>
                </li>
            </ul>
        </nav>


        <div class="userMain">
            <div class="chart">
                <h4>Mój progress na przestrzeni <?php echo $dayDiff;?></h4>
                <div style="width: 800px; height:400px;">
                    <canvas id="myChart" ></canvas>
                </div>
                <div id="addEntry">
                    <form action="..\Scripts\PHP\addWeightEntry.php" method="post">
                        <h4 class="newWeight">Dodaj nowy wpis</h4>
                        <p class="newWeight">Moja aktualna waga (kg):</p>
                        <input type="number" name="weight" class='weightInput' id='weightValue' step="0.1" max="300" min="0" value="">
                        <input type="submit" class='weightInput' value="Prześlij">
                    </form>
                </div>
                <select id="chartTypes" multiple>
                    <option value='line'>Liniowy</option>
                    <option value='bar'>Kolumnowy</option>
                    <option value="bubble">Bąbelki</option>
                    <option value="scatter">Scatter</option>
                </select>
            </div>
            <script>
                $("#chartTypes > option").on("dblclick", function() {
                    switch (document.querySelector("#chartTypes").value) {
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
                            break;    
                    }
                });
                function change(newType) 
                {
                    let canvas = document.getElementById("myChart").getContext("2d");
                    if(myChart) 
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
                };

            </script>
            <?php
                if(isset($_GET['progress']) && count($_GET) === 1)
                {
                    echo<<< CHART
                        <script>
                            const wholeChart = document.querySelector(".chart");
                            wholeChart.style.display = 'block';
                        </script> 
                    CHART;
                }
                else
                {
                    echo<<< CHART
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
                            "SELECT `trainers`.`name` as `n`,`trainers`.`surname` as `s`,`trainer_mark`,`trainer_review_descript`, `profile_picture`,`trainer_reviews`.`review_id` as `review_ids` 
                            from `trainer_reviews`
                            join `trainers`
                            on `trainer_reviews`.`trainer_id` = `trainers`.`trainer_id`
                            where `trainer_reviews`.`user_id` = $_SESSION[user_id]";
                        $result = $connect -> query($myTrainerReveiws);
                        echo "<div><h4>Dodaj recenzję swojemu trenerowi</h4><p class=myTrainers>Moi trenerzy:</p><form action=..\Scripts\PHP\addReview.php method=post>";
                        echo "<select class=trainerSelect name=trainer_id>";
                        while($option =  $result -> fetch_assoc())
                        {
                            echo "<option value=$option[review_ids]>$option[n] $option[s]</option>";
                        }
                        echo "</select>";
                        echo '<select name="mark" class="trainerSelect trainerMark">';
                        for ($i=0; $i < 6; $i++) 
                        { 
                            echo "<option value=$i>$i</option>";
                        }
                        echo "</select><input type=submit id=reviewSubmit value='Prześlij nową recenzję'>
                        <br><textarea name='userNewReview' cols='100' rows='10' placeholder='Tutaj możesz wpisać nową recenzję...'></textarea></form></div>";
                        $result = $connect -> query($myTrainerReveiws);
                        while($currentRow = $result -> fetch_assoc())
                        {
                            echo <<< USERREVIEW
                                <div class='trainer-show'>
                                    <img src='..\Images\TRAINERS IMAGES/$currentRow[profile_picture]' class='d-flex trainer-Picture'>
                                    <p>Imię: <b class='hoverOnInfo'>$currentRow[n]</b></p>                                
                                    <p>Nazwisko: <b class='hoverOnInfo'>$currentRow[s]</b></p>
                                    <p>Ocena: <b class='hoverOnInfo'>$currentRow[trainer_mark]</b></p>
                                    <p>Twoja recezja trenera: <b class='hoverOnInfo'>$currentRow[trainer_review_descript]</b></p>
                                    <p><a href="..\Scripts\PHP\delete_review?review_id=$currentRow[review_ids]">Usuń recenzję</a></p>
                                </div>
                            USERREVIEW;
                        }
                        if(isset($_GET['reviews']) && count($_GET) === 1)
                        {
                            echo<<< REVIEWS
                                <script>
                                    const reviewsBlock = document.querySelector('.review-block');
                                    gsap.fromTo(reviewsBlock,0.65,{y:0,autoAlpha:0,display:"none"},{y:10,autoAlpha:1,display:"flex"});  
                                </script> 
                            REVIEWS;
                        }
                        else
                        {
                            echo<<< REVIEWS
                                <script>
                                    const reviewsBlock = document.querySelector('.review-block');
                                    reviewsBlock.style.display = 'none'; 
                                </script> 
                            REVIEWS;
                        }
                    ?>
                </div>
            </div>
            <div class="mySchedual">
                <h4>Mój rozkład treningów</h4>
                <?php
                if(isset($_GET['calendar']) && count($_GET) === 1) 
                {
                    echo<<< CALENDAR
                        <script>
                            const mySchedual = document.querySelector('.mySchedual');
                            gsap.to(mySchedual,0.65,{y:30,autoAlpha:1,display:"block"});
                        </script>    
                    CALENDAR; 
                }
                else
                {
                    echo<<< CALENDAR
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
                        $currDay = date("d",strtotime("+1 day"));
                        $connect = @new mysqli("localhost", "root", "", "znany_trener");

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
                        for ($i=-1; $i < $howLong + 3 ; $i++) 
                        { 
                            $f = date("Y-m-d",strtotime("+$i day", strtotime($d)));
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
                            if($currDay == date("d",strtotime($f)))
                            {

                                echo "<script>const curDay = document.querySelector('.mySchedual > div > div:nth-child($currDay)');
                                curDay.style.backgroundColor = '#045de9';
                                curDay.style.backgroundImage = 'linear-gradient(315deg, #045de9 0%, #09c6f9 74%)';</script>";
                            }
                            
                        }
                        echo "<script src='..\Scripts\JS\checkUserWidth.js' crossorigin='anonymous'></script>";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <span id="footerText">Projekt Aplikacje/Bazy <i>Eryk Sowacki & <a href="https://github.com/Wichtowski">Oskar Wichtowski</a></i></span>
    </footer>
</body>
</html>
<?php
    if(isset($_GET['calendar']) && count($_GET) === 1) 
    {
        echo "<script src='..\Scripts\JS\gsap-effortless-calendar-animation.js'></script>";
    }
?>
<script src="..\Scripts\JS\nav-link.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\chartApp.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\gsap-myaccount-animations.js" crossorigin="anonymous"></script>

    
<script></script>
