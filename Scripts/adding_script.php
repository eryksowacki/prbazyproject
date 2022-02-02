<?php
    $connect = @new mysqli("localhost", "user_znany_trener", "GxvjFNXBaCxOA9Zd", "znany_trener");
    if($connect -> connect_errno)
    {
        echo "Błędne połączenie z bazą danych.";
    }
    else
    {        
        $nameList = array("Patrycja","Olaf","Grzegorz","Michał","Zuzanna","Jakub","Julia","Hubert","Dominik","Krzysztof","Anastazja","Bożena","Żaneta","Jan","Róża","Matylda","Weronika",
            'Anita','Denis','Edward','Edmund','Ferdynand','Ryszard','Gaweł','Gracjan','Paweł','Hjacynt','Jacek','January','Dordian','Felicja','Iga',"Wiktoria","Kira");
        $surnameList = array('Nowak','Woźniak','Kowalczyk','Wójcik','Król','Zając','Wieczorek','Wróbel','Pawlak','Walczak','Janik','Szczepaniak','Kaczmarczyk','Szulc','Przybysz','Filipiak','Jurek',
            'Zioło','Skwara','Mamro','Kubiak','Czarnec','Mazur','Kot','Sowa','Urbaniak','Klimek','Kruk','Wawrzyniak','Kurek','Rybak','Sobczyk','Łukasik','Olejniczak');
        $mailbox = array('o2','wp','onet','interia','int','outlook','hover','zoho','gmail','protonmail');
        $d = array(".pl",'.com');
        echo "<table><th>id</th><th>waga przed</th><th>waga po</th><th>roznica</th>";
        for($i = 0; $i < 121; $i++)
        {
            $age =  rand(18,50);
            $indexName = rand(0,count($nameList) - 1);
            $indexSurname = rand(0,count($surnameList) - 1);
            $indexEmail = rand(0,9);
            $weight = rand(50,110);
            $name = $nameList[$indexName];
            $surname = $surnameList[$indexSurname];
            $email = $name.".".$surname.$indexEmail."@".$mailbox[$indexEmail];
            if($indexEmail >= 6)
            {
                $email .= $d[1];
            }
            else
            {
                $email .= $d[0];
            }
            // echo "$name $surname $age $email ";
            // $users = "INSERT INTO `users` (`user_id`,`profile_picture`,`email`,`password`,`name`,`surname`,`age`,`bmi_id`) VALUES ('$i',NULL,'$email','000000','$name','$surname','$age','$i');";
            // $connect -> query($users);

            $ileKilo = "SELECT `weight` from `bmi` where `bmi_id` = $i order by `date` desc limit 1";
            $ileKilo = $connect -> query($ileKilo);
            $ileKilo = mysqli_fetch_row($ileKilo)[0];
            echo "<tr><td>$i</td><td>$ileKilo</td>";
            $roznica = $ileKilo;

            $indexEmail = $indexEmail / 10;
            $ileKilo += $indexEmail;
            $coin = rand(0,1);
            $flip = rand(0,3);
            $flop = $flip / 10;
            if ($coin == 0) 
            {
                $ileKilo -= $flip;
                $ileKilo += $flop;
            $roznica -= $ileKilo;

                $bmi = "INSERT INTO `bmi` (`bmi_id`,`weight`) VALUES ('$i','$ileKilo');";
                echo "<td>$ileKilo</td><td>$roznica</td></tr>";
                
                 $connect -> query($bmi);
            }
            else
            {
                $ileKilo += $flip;
                $ileKilo -= $flop;
            $roznica -= $ileKilo;

                echo "<td>$ileKilo</td><td>$roznica</td></tr>";
                $bmi = "INSERT INTO `bmi` (`bmi_id`,`weight`) VALUES ('$i','$ileKilo');";

                 $connect -> query($bmi);
            }
        }
        echo "</table>";

        

        /*
            $usr_train = "INSERT INTO `usr_train` VALUES ('','','','','','','');";
            $trainers = "INSERT INTO `trainers` VALUES ('','','','','','','');";
            $gyms = "INSERT INTO `gyms` VALUES ('','','','','','','');";
            $gym_reviews = "INSERT INTO `gym_reviews` VALUES ('','','','','','','');";
            $trainer_reviews = "INSERT INTO `trainer_reviews` VALUES ('','','','','','','');";
        */
    } 
?>

 