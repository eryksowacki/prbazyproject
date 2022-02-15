<!DOCTYPE html>
<?php
    session_start();
    require_once '..\Scripts\PHP\connect_user.php';
    $_SESSION['user_id'] = 18;
    $sql = "SELECT `weight` as `w`, `date` as `d` FROM `bmi` `b` where `bmi_id` = $_SESSION[user_id] order by `d` asc;";
    $result = $connect -> query($sql);
    echo "<script> const weight = [];const date = [];";
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
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
                <canvas id="myChart" style="width:1300px; height:100px;"></canvas>
                <div id="addEntry">
                    <form action="..\Scripts\PHP\addWeightEntry.php" method="post">
                        <h4 class="newWeight">Dodaj nowy wpis</h4>
                        <p class="newWeight">Moja aktualna waga (kg):</p>
                        <input type="number" name="weight" class='weightInput' max="300" min="0">
                        <input type="submit" class='weightInput' value="Prześlij">
                    </form>
                </div>
            </div>

            <div class="review-block">
                <div>
                    <?php
                        $myTrainerReveiws = 
                            "SELECT `trainers`.`name` as `n`,`trainers`.`surname` as `s`,`trainer_mark`,`trainer_review_descript`, `profile_picture`,`trainer_id`
                            from `trainer_reviews`
                            join `trainers`
                            on `trainer_reviews`.`trainer_review_id` = `trainers`.`trainer_id`
                            where `trainer_reviews`.`user_id` = $_SESSION[user_id]";
                        $result = $connect -> query($myTrainerReveiws);
                        echo"<div><h4>Dodaj recenzję swojemu trenerowi</h4><p class=myTrainers>Moi trenerzy:</p><form action=..\Scripts\PHP\deleteUser.php method=post><select class=selectIDK name=addReview>";
                        while($option =  $result -> fetch_assoc())
                        {
                            echo '<option value='."$option[trainer_id]>"."$option[n] $option[s]".'</option>';
                        }
                        echo "</select><input type=submit id=reviewSubmit value='Prześlij nową recenzję'><br><textarea name='userNewReview' cols='100' rows='10' placeholder='Tutaj możesz wpisać nową recenzję...'></textarea></form></div>";
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
                                    <p><a href="..\Scripts\PHP\delete_review?trainer_id=$currentRow[trainer_id]">Usuń recenzję</a></p>
                                </div>
                            USERREVIEW;
                        }
                        
                    ?>
                </div>
            </div>

            <div class="mySchedual">
                <h4>Mój rozkład treningów</h4>
            </div>
        </div>
    </div>
    <footer id="footer">
        <span id="footerText">Projekt Aplikacje/Bazy <i>Eryk Sowacki & <a href="https://github.com/Wichtowski">Oskar Wichtowski</a></i></span>
    </footer>
</body>
</html>
<script src="..\Scripts\JS\bootstrap-5.0.2-dist\js\bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\node_modules\jquery\dist\jquery.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\node_modules\chart.js\dist\chart.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\node_modules\gsap\dist\gsap.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\nav-link.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="..\Scripts\JS\chartApp.js" crossorigin="anonymous"></script>
<script>

    const chartBtn = document.querySelector("#weightProggress");
    const wholeChart = document.querySelector(".chart");
    const reviewsBlock = document.querySelector('.review-block');
    const myTrainingSchedule = document.querySelector('#myTrainingSchedule');
    const mySchedual = document.querySelector('.mySchedual');
    mySchedual.style.display = 'none';
    wholeChart.style.display = 'none';
    reviewsBlock.style.display = 'none';






     // TRAINER REVIEWS
     $('#myTrainerReviews').on("click", function() {
        if(reviewsBlock.style.display != 'none')
        {
            gsap.to(reviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"}); // rev
        }
        else
        {
            if(wholeChart.style.display != 'block')
            {
                gsap.to(reviewsBlock,0.65,{y:20,autoAlpha:1,display:"block"}); 
            }
            else
            {
                gsap.to(wholeChart,0.5,{y:0,opacity:0}); // chart
                setTimeout(() => {
                    wholeChart.style.display = 'none';
                    gsap.to(reviewsBlock,0.65,{y:20,autoAlpha:1,display:"block"}); // rev
                }, 700);
            }
        }
    });
    

    $(chartBtn).on("click", function() {
        gsap.to(reviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
        gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev

        if(wholeChart.style.display != 'none')
        {
            gsap.to(wholeChart,0.5,{y:-10,opacity:0}); // if displaying click again to peacefully turn off
            setTimeout(() => {
                wholeChart.style.display = 'none';
            }, 700);
        }
        else                                            // else display block after 700ms
        {
            myChart.destroy()
            gsap.to(wholeChart,0.5,{y:10,autoAlpha:1,display: 'block'});    // chart
            wholeChart.style.display = 'block';
            myChart = new Chart(canvas, userProgressChart);
        }
    });
    

    




    $(myTrainingSchedule).on('click', function (){
        if(mySchedual.style.display != 'none') 
        {
            gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});
        }
        else
        {
            gsap.to(wholeChart,0.5,{y:0,opacity:0}); // chart
            gsap.to(reviewsBlock,0.65,{y:0,autoAlpha:0,display:"none"}); // rev
            setTimeout(() => {
                wholeChart.style.display = 'none';
            }, 700);
            gsap.to(mySchedual,0.65,{y:20,autoAlpha:1,display:"block"});
        }
    });








</script>