<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            height:4rem;
            display: grid;

            width: max-content;
            background-color: #6a93cb;
            background-image: linear-gradient(315deg, #6a93cb 0%, #a4bfef 74%); 
            border-radius:16px;
            padding:1em;
        }
        h4 > p{
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
    </style>    
</head>
<body>
    <div class="gridInGrid">
        <?php
            date_default_timezone_set("UTC");
            $d = date("Y-m-d");
            $howLong = date("d",strtotime(date("Y-m-t",  strtotime($d))));
            // Day of the last date 
            // $howLong = date("d", $lastdate);

            // $howLong = date("d") - date("m");
            // $howLong = date("d") + $howLong;
            $_SESSION['user_id'] = 18;
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
            for ($i=0; $i < $howLong ; $i++) 
            { 
                $f = date("Y-m-d",strtotime("+$i day", strtotime($d)));
                echo "<div class='calendar '>";
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

<script src="..\Scripts\JS\bootstrap-5.0.2-dist\js\bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\node_modules\jquery\dist\jquery.min.js" crossorigin="anonymous"></script>
<script src="..\Scripts\node_modules\gsap\dist\gsap.min.js" crossorigin="anonymous"></script>
<script>
    let dayAnimation = document.querySelectorAll('.calendar');
    const tl = gsap.timeline();
    const from = {y:-10,opacity:0}; 
    const to = {y:0,opacity:1};

    tl.fromTo(dayAnimation[0],0.75,from,to)
        .fromTo(dayAnimation[1],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[2],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[3],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[4],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[5],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[6],0.75,from,to,"-=0.75")

        .fromTo(dayAnimation[7],0.75,from,to)
        .fromTo(dayAnimation[8],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[9],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[10],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[11],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[12],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[13],0.75,from,to,"-=0.75")

        .fromTo(dayAnimation[14],0.75,from,to)
        .fromTo(dayAnimation[15],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[16],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[17],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[18],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[19],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[20],0.75,from,to,"-=0.75")

        .fromTo(dayAnimation[21],0.75,from,to)
        .fromTo(dayAnimation[22],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[23],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[24],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[25],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[26],0.75,from,to,"-=0.75")
        .fromTo(dayAnimation[27],0.75,from,to,"-=0.75")

        .fromTo(dayAnimation[28],0.75,from,to);
        if(typeof dayAnimation[29] != "undefined")
        {
            gsap.fromTo(dayAnimation[29],0.75,from,to,"-=0.5");
            if(typeof dayAnimation[30] != "undefined")
            {
                gsap.fromTo(dayAnimation[30],0.75,from,to,"-=0.5");
                if(typeof dayAnimation[31] != "undefined")
                {
                    gsap.fromTo(dayAnimation[31],0.75,from,to,"-=0.5");
                }
            }
        }
</script>