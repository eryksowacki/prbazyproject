<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../CSS/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../CSS/style.css">
    <script src="../../JS/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../node_modules/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="../../node_modules/chart.js/dist/chart.min.js" crossorigin="anonymous"></script>
    <script src="../../node_modules/gsap/dist/gsap.min.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="Images/WEBSITE IMAGES/LOGO.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <title>Document</title>
    <style>
        :root{
            --bs-blue: #0d6efd;
        }
        .gridInGrid{
            display: grid; 
            grid-auto-flow: row; 
            grid-template-columns: repeat(7, auto); 
            grid-template-rows: repeat(4, auto); 
            grid-template-areas: 
                ". . . . . ."
                ". . . . . ."
                ". . . . . ."
                ". . . . . ."; 
            justify-content: center;
            gap: 1.2rem 0.25rem;
        }
        .calendar{
            display: grid;
            width: auto;
            height:fit-content;
            background-color: #6a93cb;
            background-image: linear-gradient(315deg, #6a93cb 0%, #a4bfef 74%); 
            border-radius:16px;
            padding:1em;
        }
        h4 > p{
            font-size:1rem;
            transition:0.3s;
            width:fit-content;
            margin:0px;
            margin-left:2rem;

        }
        h4 > p:hover{
            transition:0.45s;
            color:var(--bs-blue);
            cursor:context-menu;
        }
        h4{
            transition:0.45s;
            font-size:1rem;
            font-weight:400;
            margin:0px;
        }
        
        .freeDay{
            margin:0px;
            padding:10px;
            opacity: 0.7;
            cursor:context-menu;
            transition:0.3s;
        	user-select: none;
        }
        .freeDay:hover{
            transition:0.3s;
            font-weight:400;
            opacity: 1;
        }






        .addTraining{
            width: max-content;
            height:max-content;
            background-color: #6a93cb;
            background-image: linear-gradient(315deg, #6a93cb 0%, #a4bfef 74%); 
            border-radius:16px;
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            top:40%;
            padding:1.125rem;
        }
        
        .overlay {
            background-color: rgba(0,0,0,0.7);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }
        .addTraining > form{
            display:grid;
            grid-auto-rows: 1fr; 
            grid-template-columns: repeat(4, auto); 
            grid-template-rows: repeat(3, auto); 
            align-items: baseline;
            gap:1em 2em;

        }
        .addTraining > form > *{
            padding:0.125rem;
            outline:none;
            transition: all 0.2s;
        }
        /*
        .paragraph{
            margin: 0px;
        }
        .addTraining > form > p:nth-child(7){
            display:inline-flex;
        } */
    </style>    
</head>
<body>

    <div class="overlay">
    </div>
    <div class="addTraining">
        <form action="Scripts/PHP/addNewTraining.inc.php" method="post">
            <p class="paragraph">Data</p>
            <input type="date" name="date" id="dateInput">
            <p class="paragraph">Godzina</p>
            <input type="time" name="time" id="time" value="12:00">
            <?php
                $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");

                $_SESSION["user_id"] = 0;

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





<div class="gridInGrid">
    <?php
        $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
        date_default_timezone_set("UTC");
        $d = date("Y-5-d");
        $howLong = date("d",strtotime(date("Y-m-t",  strtotime($d))));
        // Day of the last date 
        // $howLong = date("d", $lastdate);

        // $howLong = date("d") - date("m");
        // $howLong = date("d") + $howLong;
        $_SESSION['user_id'] = 0;

        
        
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
        for ($i=0; $i < $howLong ; $i++) 
        { 
            $f = date("Y-m-d",strtotime("+$i day", strtotime($d)));
            echo "<div class='calendar'>";
            $dzien_tyg = date("l",strtotime("+$i day", strtotime($d)));
            echo "<b>$f $dzien_tyg_pl[$dzien_tyg]</b>";
           
            $tmp = 0;
            $result = $connect -> query($sql);

            while($row = $result -> fetch_assoc())
            {   
                // echo $row['date']," ",$f," ";
                if($row['date'] === $f)
                {
                    echo "<h4>Typ treningu: <p>$row[training_descript]</p></h4>";
                }
                else
                {
                    $tmp++;
                }
                array_push($assoc,$row['date']);
            }
            if($tmp == count($assoc)){

                echo "<p class=freeDay>Dzień wolny</p>";
                echo <<< SCRIPT
                
SCRIPT;                    
                $assoc = [];
            }
            else
            {
                $assoc = [];
            }
            
            echo "</div>";
        }
    ?>
</div>
</body>
</html>

<script>
    // let dayAnimation = document.querySelectorAll('.calendar');
    // const tl = gsap.timeline();
    // const from = {y:-10,opacity:0}; 
    // const to = {y:0,opacity:1};

    // tl.fromTo(dayAnimation[0],0.75,from,to)
    //     .fromTo(dayAnimation[1],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[2],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[3],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[4],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[5],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[6],0.75,from,to,"-=0.75")

    //     .fromTo(dayAnimation[7],0.75,from,to)
    //     .fromTo(dayAnimation[8],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[9],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[10],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[11],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[12],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[13],0.75,from,to,"-=0.75")

    //     .fromTo(dayAnimation[14],0.75,from,to)
    //     .fromTo(dayAnimation[15],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[16],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[17],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[18],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[19],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[20],0.75,from,to,"-=0.75")

    //     .fromTo(dayAnimation[21],0.75,from,to)
    //     .fromTo(dayAnimation[22],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[23],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[24],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[25],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[26],0.75,from,to,"-=0.75")
    //     .fromTo(dayAnimation[27],0.75,from,to,"-=0.75")

    //     .fromTo(dayAnimation[28],0.75,from,to);
    //     if(typeof dayAnimation[29] != "undefined")
    //     {
    //         gsap.fromTo(dayAnimation[29],0.75,from,to,"-=0.5");
    //         if(typeof dayAnimation[30] != "undefined")
    //         {
    //             gsap.fromTo(dayAnimation[30],0.75,from,to,"-=0.5");
    //             if(typeof dayAnimation[31] != "undefined")
    //             {
    //                 gsap.fromTo(dayAnimation[31],0.75,from,to,"-=0.5");
    //             }
    //         }
    //     }
</script>