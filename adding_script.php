<?php
    $connect = @new mysqli("localhost", "user_znany_trener", "AFeorRM4nVQoqwJz", "znany_trener");
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
        for($i = 0; $i < 99; $i++)
        {
            $age =  rand(18,50);
            $indexName = rand(0,count($nameList) - 1);
            $indexSurname = rand(0,count($surnameList) - 1);
            $indexEmail = rand(0,9);
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
            echo "$name $surname $age $email ";
            // $users = "INSERT INTO `users` (`user_id`,`profile_picture`,`email`,`password`,`name`,`surname`,`age`,`bmi_id`) VALUES (NULL,NULL,'$email','$password','000','$name','$surname','$age','$i');";
        }

        // $connect -> query($users);
        

        $bmi = "INSERT INTO `bmi` VALUES ('','','','','','','');";
        /*
            $usr_train = "INSERT INTO `usr_train` VALUES ('','','','','','','');";
            $trainers = "INSERT INTO `trainers` VALUES ('','','','','','','');";
            $gyms = "INSERT INTO `gyms` VALUES ('','','','','','','');";
            $gym_reviews = "INSERT INTO `gym_reviews` VALUES ('','','','','','','');";
            $trainer_reviews = "INSERT INTO `trainer_reviews` VALUES ('','','','','','','');";
        */
    } 
?>