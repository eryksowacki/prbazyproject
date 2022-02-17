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
        .asd{
            display: grid; 
            grid-auto-flow: row; 
            grid-template-columns: repeat(7, auto); 
            grid-template-rows: repeat(4, auto); 
            gap: 2em 1.125em; 
            grid-template-areas: 
                ". . . . . ."
                ". . . . . ."
                ". . . . . ."
                ". . . . . ."; 
        }
        
        .grid{
            display: grid;
        }
        .calendar{
            height:4rem;
            background-image: linear-gradient(to top, #b3ffab 0%, #12fff7 100%);
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
            transition:0.3s;
            font-weight:500;
            color:var(--bs-blue);
            cursor:context-menu;
        }
        h4{
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
            opacity: 1;
        }
        .hiddenText{
            user-select: none;
            display:none;
            position: absolute;
            background: black;
            height: max-content;
            width: 150px;
            padding:6px;
            margin: 30px;
            border-radius:10px;
            z-index: -1;
            color:white;
        }
    </style>    
</head>
<body>
    <div class="asd">
        <?php
            date_default_timezone_set("UTC");
            $d = date("Y-06-1");
            $howLong = 30 - date("d");
            $howLong = date("d") + $howLong;
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
                echo "<div class='calendar grid'>";
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

                    echo "<p class=freeDay>Dzień wolny</p><div class=hiddenText>Kliknij podwójnie aby dodać swój trening</div>";
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
    tl.fromTo(dayAnimation[0],1,{y:-10,opacity:0},{y:0,opacity:1})
        .fromTo(dayAnimation[1],1,{y:-10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[2],1,{y:-10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[3],1,{y:-10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[4],1,{y:-10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[5],1,{y:-10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[6],1,{y:-10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[7],1,{y:10,opacity:0},{y:0,opacity:1},"+=1")
        .fromTo(dayAnimation[8],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[9],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[10],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[11],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[12],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[13],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[14],1,{y:10,opacity:0},{y:0,opacity:1},"+=1")
        .fromTo(dayAnimation[15],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[16],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[17],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[18],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[19],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")
        .fromTo(dayAnimation[20],1,{y:10,opacity:0},{y:0,opacity:1},"-=1")

</script>