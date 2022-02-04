<?php
    $connect = @new mysqli("localhost", "user_znany_trener", "GxvjFNXBaCxOA9Zd", "znany_trener");
    if($connect -> connect_errno)
    {
        echo "Błędne połączenie z bazą danych.";
    }
    else
    {   
        /*     
        $nameList = array("Patrycja","Olaf","Grzegorz","Michał","Zuzanna","Jakub","Julia","Hubert","Dominik","Krzysztof","Anastazja","Bożena","Żaneta","Jan","Róża","Matylda","Weronika",
            'Anita','Denis','Edward','Edmund','Ferdynand','Ryszard','Gaweł','Gracjan','Paweł','Hjacynt','Jacek','January','Dordian','Felicja','Iga',"Wiktoria","Kira");
        $surnameList = array('Nowak','Woźniak','Kowalczyk','Wójcik','Król','Zając','Wieczorek','Wróbel','Pawlak','Walczak','Janik','Szczepaniak','Kaczmarczyk','Szulc','Przybysz','Filipiak','Jurek',
            'Zioło','Skwara','Mamro','Kubiak','Czarnec','Mazur','Kot','Sowa','Urbaniak','Klimek','Kruk','Wawrzyniak','Kurek','Rybak','Sobczyk','Łukasik','Olejniczak');
        $mailbox = array('o2','wp','onet','interia','int','outlook','hover','zoho','gmail','protonmail');
        $d = array(".pl",'.com');
        
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
                
            // $connect -> query($bmi);
            }
            else
            {
                $ileKilo += $flip;
                $ileKilo -= $flop;
            $roznica -= $ileKilo;

                echo "<td>$ileKilo</td><td>$roznica</td></tr>";
                $bmi = "INSERT INTO `bmi` (`bmi_id`,`weight`) VALUES ('$i','$ileKilo');";

        //          $connect -> query($bmi);
            }
        }
        */
        /*
        for($i = 0; $i < 121; $i++)
        {
            $specialization= ['Kulturystyka','Fitness','Crossfit','Lekkoatletyka','Kalistenika','Pliometryka','Pilates','Aerobik','Bouldering','MMA','Gimnastyka sportowa'];
            $cities = ['Warszawa','Kraków','Poznań','Gdańsk','Lublin','Łódź','Wrocław','Toruń','Szczecin','Olsztyn','Katowice','Bydgoszcz'];
            $gyms = ['McFit','CityFit','Calypso Fitness Club','S4 Fitness Club','Fitness Platinium','Pure Jatomi','Fitness24Seven','Fit for Free'];
            $money = [120,80,110,90,100,150,130];
            $indexName = rand(0,count($nameList) - 1);
            $indexSurname = rand(0,count($surnameList) - 1);
            $moneyIndex = rand(0,count($money) - 1);
            $gym = rand(0,count($gyms) - 1);
            $cityIndex = rand(0,count($cities) - 1);
            $indexEmail = rand(0,9);
            $specIndex = rand(0,count($specialization) - 1);
            
            $spe = $specialization[$specIndex];
            $g = $gyms[$gym];
            $c = $cities[$cityIndex];
            $mon = $money[$moneyIndex];
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
            $trainers = "INSERT INTO `trainers` (`trainer_id`,`specialization`, `email`, `password`, `trainer_review_id`, `name`, `surname`, `city`, `gym_name`, `prize_per_hour`)
            VALUES ('$i','$spe','$email','000000','$i','$name','$surname','$c','$g','$mon');";

            // $connect -> query($trainers);

        }
        */


       /*
        $opinions = ['Bardzo dobry trener, Pozdrawiam' ,'Polacem trenera Olafa, dzięki niemu poprawiłem moje techniki podnoszenia ciężarów',
        "Minęło kilka miesięcy i dzięki Pani Marzenie widać efekty! <3", 'Profesjonalizm widać w każdym calu!'."Wiedza merytoryczna poparta praktyką sprawia, mistrzostwo!","Trenerka doskonale rozumieme czego potrzebuje, Pozdrawiam",
        "Tak, gorąco polecam trenerów, którzy znają się na treningu, prowadzą pod kontem żywienia i suplementacji", "Szczerze, z całego serca polecam trenerską załogę. Mnóstwo motywacji, pomysłów i energii otrzymuje za każdym razem, jak jestem na treningu.",
        "Mateusz się bardzo dobrym doświadczonym trenerem chodź wyglada młodo 🙂","Gorąco polecam współpracę z Mateuszem! Studnia wiedzy, punktualność, indywidualne podejście do treningów - to tylko kilka cech, które mogę wymienić.",
        "Super trener, trenujemy razem od sierpnia. Profesjonalne podejście do treningów i luzna atmosfera na siłce. Jako początkujący nie czuję sie zagubiony z ćwiczeniami i Mateusz daje sporo rad dotyczących zdrowego trybu odżywiania i prowadzenia treningów",
        "Świetny trener z ogromną wiedzą, pozytywnym nastawieniem i poczuciem humoru, każdy trening jest rzetelnie rozpisany.","Otwarty, uśmiechnięty, z wielkim poczuciem humoru i dystansem do siebie.",
        "Polecam 🙂 świetny instruktor 🙂 można liczyć na naprawdę fachową i skuteczną poradę o czym przekonałam się osobiście 🙂","Pracować z Marcinem miałam przyjemność na co dzień przez 9 miesięcy, dam sobie rękę uciąć za tego Pana. Jestem pewna, że jeszcze o nim będzie głośno.",
        "Współpraca z Bartkiem spełniła moje najśmielsze oczekiwania.","Jako trener okazał się wymagający kiedy trzeba, dopingujący gdy brak sił, a jego kreatywność do wymyślania nowych ćwiczeń czyni go trenerem niezawodnym.",
        "To trener z charyzmą 😎"," Podchodzi do sprawy profesjonalnie i każdego trenującego traktuje indywidualnie.","Nie korzysta z typowych szablonów treningowych, a każdy trening jest intensywny, aż parują szyby :)",
        "Trener personalny godny polecenia. Podchodzi do osoby indywidualnie.","Ćwiczenia rozpisane i wytłumaczone. W razie jakis pytan zawsze pomaga.","Profesjonalizm, znakomite poczucie humoru i porządny wycisk! ",
        "Doskonały trener! Zarówno do zajęć indywidualnych i grupowych.","Dobra energia, poczucie humoru, ale i konsekwencja, której wymaga nie tylko od siebie, ale od klienta!!","Daje mega wycisk, super cwiczenia i nadzor poprawnego ich wykonywania.",
        "Profesjonalnym podejściem i zaangażowaniem motywuje najlepiej na świecie.","Fajna atmosfera – w takim towarzystwie człowiek nawet ma radochę , że się umęczy – bardzo dobrze przygotowane ćwiczenia dla osób po urazach","SIŁA MASA RZEŹBA !!!!",
        "REWELACJA!!","Bardzo polecam 🙂","Polecam wszystkim treningi z Active Life","Trening trwał 4 miesiące i przez ten czas udało się w pewnym stopniu zwalczyć moje lenistwo i schudnąć kilka kilogramów",
        "Rewelacja! Trenuję z nimi już półtora roku.","Polecam każdemu, kto chce się za siebie zabrać","Z czystym sumieniem mogę polecić ich usługi wszystkim, którzy chcą lepiej się poczuć, zrzucić zbędne kilogramy i być w dobrej formie"];
        $repeat = "";
        for($i = 0; $i < 121; $i++)
        {
            $opinionsIndex = rand(0,count($opinions) - 1);
            $opinion = $opinions[$opinionsIndex];
            $mark = rand(4,5);
            if($repeat !== $opinion)
            {
                $trainer_reviews = "INSERT INTO `trainer_reviews`(`trainer_review_id`, `trainer_mark`, `trainer_review_descript`) VALUES ('$i','$mark','$opinion');";
                $connect -> query($trainer_reviews);
                echo $i." ".$mark." ".$opinion."<br>";

                
            }
            else
            {
                $opinionsIndex = rand(0,count($opinions) - 1);
                if($opinionsIndex == count($opinions) - 1)
                {
                    $opinion = $opinions[$opinionsIndex - 1];
                }
                else
                {
                    $opinion = $opinions[$opinionsIndex + 1];
                }
                $trainer_reviews = "INSERT INTO `trainer_reviews`(`trainer_review_id`, `trainer_mark`, `trainer_review_descript`) VALUES ('$i','$mark','$opinion');";
                $connect -> query($trainer_reviews);
                echo $i." ".$mark." ".$opinion."<br>";
            }
            $repeat = $opinion;
        } 
        echo count($opinions);
        */

         /*
            $usr_train = "INSERT INTO `usr_train` VALUES ('','','','','','','');";
            $gyms = "INSERT INTO `gyms` VALUES ('','','','','','','');";
            $gym_reviews = "INSERT INTO `gym_reviews` VALUES ('','','','','','','');";
        */
    
    } 
?>

 