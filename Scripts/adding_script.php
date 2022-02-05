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

        for($i = 0; $i < 550; $i++)
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
            // $bmi = "INSERT INTO `bmi` (`bmi_id`,`weight`) VALUES ('$i','$weight');";
            // $connect -> query($bmi);
            
            // echo "<table>";
            $sql = "SELECT `weight` from `bmi` where `bmi_id` = $i order by `date` desc limit 1";
            $result = $connect -> query($sql);
            $ileKilo = mysqli_fetch_row($result)[0];
            // echo "<tr><td>$i</td><td>$ileKilo</td>";
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
            }
            else
            {
                $ileKilo += $flip;
                $ileKilo -= $flop;
                $roznica -= $ileKilo;
            }
            // echo "<td>$ileKilo</td><td>$roznica</td></tr>";
            $bmi = "INSERT INTO `bmi` (`bmi_id`,`weight`) VALUES ('$i','$ileKilo');";
            // $connect -> query($bmi);

            // echo "</table>";
        }
        
        
        for($i = 0; $i < 121; $i++)
        {
            $specialization= ['Kulturystyka','Fitness','Crossfit','Lekkoatletyka','Kalistenika','Pliometryka','Pilates','Aerobik','Bouldering','MMA','Gimnastyka sportowa'];
            $gyms = ['McFit','CityFit','Calypso Fitness Club','S4 Fitness Club','Fitness Platinium','Pure Jatomi','Fitness24Seven','Fit for Free'];
            $money = [120,80,110,90,100,150,130];
            $indexName = rand(0,count($nameList) - 1);
            $indexSurname = rand(0,count($surnameList) - 1);
            $moneyIndex = rand(0,count($money) - 1);
            $gym = rand(0,count($gyms) - 1);
            $indexEmail = rand(0,9);
            $specIndex = rand(0,count($specialization) - 1);
            
            $spe = $specialization[$specIndex];
            $g = $gyms[$gym];
            $mon = $money[$moneyIndex];
            $name = $nameList[$indexName];
            $surname = $surnameList[$indexSurname];
            $email = $name.".".$surname.$indexEmail."@".$mailbox[$indexEmail];
            $pass = sha1("000000");
            if($indexEmail >= 6)
            {
                $email .= $d[1];
            }
            else
            {
                $email .= $d[0];
            }
            $trainers = "INSERT INTO `trainers` (`trainer_id`,`specialization`, `email`, `password`, `trainer_review_id`, `name`, `surname`, `gym_id`, `prize_per_hour`)
            VALUES ('$i','$spe','$email','$pass','$i','$name','$surname','$gym','$mon');";

            //  $connect -> query($trainers);

        }


        $trainings = ['Full Body Workout','Split','O stałej intensywności','Interwałowy','Core','Crossfit','Pilates','Oporowy','Wytrzymałościowy','Kondycyjny','Obwodowy','Funkcjonalny','Relaksacyjny'];
        for($i = 0; $i < 550; $i++)
        {
            $randIndex = rand(0,count($trainings) - 1);
            $t = $trainings[$randIndex];
            $id_trenera = mysqli_fetch_row($connect -> query("SELECT `trainer_id` FROM `usr_train` where `user_id` = $i;"));
            $row = mysqli_fetch_row($connect -> query("SELECT `gym_id` FROM `trainers` WHERE `trainer_id` = $id_trenera[0]"));
            $date = date("d");
            $date += rand(9,20);
            $str = "2022/06/";
            date_default_timezone_get();
            $z = ":30";
            $time = rand(6,20).$z;
            // echo "id usera: $i  id trenera: $id_trenera[0]  data: $str$date    godzina: $time  nazwa treningu: $t  id siłowni: $row[0]<br>";
            $usr_train = "INSERT INTO `usr_train` (`user_id`, `trainer_id`, `training_date`, `training_descript`, `gym_id`) VALUES ('$i','$id_trenera[0]','$str$date $time','$t','$row[0]');";
            // $connect -> query($usr_train);
            
        }
        


       
        $opinions = ['Bardzo dobry trener, Pozdrawiam' ,'Polacem trenera Olafa, dzięki niemu poprawiłem moje techniki podnoszenia ciężarów',
        "Minęło kilka miesięcy i dzięki Pani Marzenie widać efekty! <3", 'Profesjonalizm widać w każdym calu!'."Wiedza merytoryczna poparta praktyką sprawia, mistrzostwo!","Trenerka doskonale rozumieme czego potrzebuje, Pozdrawiam",
        "Tak, gorąco polecam trenerów, którzy znają się na treningu, prowadzą pod kontem żywienia i suplementacji", "Szczerze, z całego serca polecam trenerską załogę. Mnóstwo motywacji, pomysłów i energii otrzymuje za każdym razem, jak jestem na treningu.",
        "Mateusz się bardzo dobrym doświadczonym trenerem chodź wyglada młodo 🙂","Gorąco polecam współpracę z Mateuszem! Studnia wiedzy, punktualność, indywidualne podejście do treningów - to tylko kilka cech, które mogę wymienić.",
        "Super trener, trenujemy razem od sierpnia. Profesjonalne podejście do treningów i luzna atmosfera na siłce. Jako początkujący nie czuję sie zagubiony z ćwiczeniami i Mateusz daje sporo rad dotyczących zdrowego trybu odżywiania i prowadzenia treningów",
        "Świetny trener z ogromną wiedzą, pozytywnym nastawieniem i poczuciem humoru, każdy trening jest rzetelnie rozpisany.","Otwarty, uśmiechnięty, z wielkim poczuciem humoru i dystansem do siebie.",
        "Polecam 🙂 świetny instruktor 🙂 można liczyć na naprawdę fachową i skuteczną poradę o czym przekonałam się osobiście 🙂","Pracować miałam przyjemność na co dzień przez 9 miesięcy, dam sobie rękę uciąć za tego Pana. Jestem pewna, że jeszcze o nim będzie głośno.",
        "Współpraca z Bartkiem spełniła moje najśmielsze oczekiwania.","Jako trener okazał się wymagający kiedy trzeba, dopingujący gdy brak sił, a jego kreatywność do wymyślania nowych ćwiczeń czyni go trenerem niezawodnym.",
        "To trener z charyzmą 😎"," Podchodzi do sprawy profesjonalnie i każdego trenującego traktuje indywidualnie.","Nie korzysta z typowych szablonów treningowych, a każdy trening jest intensywny, aż parują szyby :)",
        "Trener personalny godny polecenia. Podchodzi do osoby indywidualnie.","Ćwiczenia rozpisane i wytłumaczone. W razie jakis pytan zawsze pomaga.","Profesjonalizm, znakomite poczucie humoru i porządny wycisk! ",
        "Doskonały trener! Zarówno do zajęć indywidualnych i grupowych.","Dobra energia, poczucie humoru, ale i konsekwencja, której wymaga nie tylko od siebie, ale od klienta!!","Daje mega wycisk, super cwiczenia i nadzor poprawnego ich wykonywania.",
        "Profesjonalnym podejściem i zaangażowaniem motywuje najlepiej na świecie.","Fajna atmosfera – w takim towarzystwie człowiek nawet ma radochę , że się umęczy – bardzo dobrze przygotowane ćwiczenia dla osób po urazach","SIŁA MASA RZEŹBA !!!!",
        "REWELACJA!!","Bardzo polecam 🙂","Polecam wszystkim treningi z Active Life","Trening trwał 4 miesiące i przez ten czas udało się w pewnym stopniu zwalczyć moje lenistwo i schudnąć kilka kilogramów",
        "Rewelacja! Trenuję z nimi już półtora roku.","Polecam każdemu, kto chce się za siebie zabrać","Z czystym sumieniem mogę polecić ich usługi wszystkim, którzy chcą lepiej się poczuć, zrzucić zbędne kilogramy i być w dobrej formie"];
        $repeat = "";

        for($i = 0; $i < 550; $i++)
        {
            $opinionsIndex = rand(0,count($opinions) - 1);
            $opinion = $opinions[$opinionsIndex];
            $mark = rand(4,5);
            $userId = mysqli_fetch_row($connect -> query("SELECT DISTINCT `trainers`.`trainer_id` FROM `trainers` join `usr_train` ON `trainers`.`trainer_id` = `usr_train`.`trainer_id` where `user_id` = $i"))[0];
            // echo "trainer_id: $userId   ocena:  $mark    <b>user id: $i</b>     opinia: $opinion<br>";
            if($repeat !== $opinion)
            {
                $trainer_reviews = "INSERT INTO `trainer_reviews` (`trainer_review_id`, `trainer_mark`, `trainer_review_descript`,`user_id`) VALUES ('$userId',$mark','$opinion','$i');";
                // $connect -> query($trainer_reviews);
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
                $trainer_reviews = "INSERT INTO `trainer_reviews`(`trainer_review_id`, `trainer_mark`, `trainer_review_descript`,`user_id`) VALUES ('$userId','$mark','$opinion','$i');";
                // $connect -> query($trainer_reviews);
            }
            $repeat = $opinion;
        } 
        





        $cities = ['Warszawa','Kraków','Poznań','Gdańsk','Lublin','Łódź','Wrocław','Toruń','Szczecin','Olsztyn','Katowice','Bydgoszcz'];
        $gyms = ['McFit','CityFit','Calypso Fitness Club','S4 Fitness Club','Fitness Platinium','Pure Jatomi','Fitness24Seven','Fit for Free'];
        $id = 0;
        for($i = 0; $i < count($gyms); $i++)
        {
            for($z = 0; $z < count($cities) ; $z++)
            {
                $gym = "INSERT INTO `gyms` (`gym_id`,`gym_name`,`gym_review_id`,`city`) VALUES ('$id','$gyms[$i]','$i','$cities[$z]');";
                // $connect -> query($gym);
                // echo "id: $id Nazwa siłowni: $gyms[$i] $cities[$z] <br>";
                $id++;
            }
        }
        



        $gyms = ['McFit','CityFit','Calypso Fitness Club','S4 Fitness Club','Fitness Platinium','Pure Jatomi','Fitness24Seven','Fit for Free'];
        $gym_review1 = ['Szczerze mówiąc myślę że to jeden z gorszych klubów.','Bardzo duże braki w sprzątaniu','Automat na napoje nie działa. Wrzuciłem monetę napoju nie dostałem, pieniędzy też nie. Tragedia',
        'Wróciłem po przerwie i brak kart parkingowych, szafki rozpieprzone, steppery wszystkie zepsute. Żenada','Przyszedlem, postalem na recepcji poklikalem przycisk wezwij trenera i nikt nawet nie przyszedl.','Grzyb na sufitach i pod prysznicami',
        'Bardzo dużo dziur w podłodze, połowa maszyn oporowych jak i do Cardio nie działa, duża ilość szafek nie działa','Połowa szafek jest niesprawna. Są pozacinane, mają urwane drzwiczki,','porwane siedziska na maszynach',
        'od jakiś 2-3 miesięcy nie ma suszarki','Chyba jedyna silownia która nie akceptuje karty Multisport 😡🤬. Jak to możliwe? Fatalnie!','Parodia siłowni.',];

        $gym_review2 = ['Łazienki w fatalnym stanie 🤬🤬. Rowalajace się szafki.','Brudno, częściowo sprzęt niesprawny, niedziałające szafki, część sprzętów popsuta','Najlepsza siłownia w rejonje',
        'Oglnie nie polecam','Pod prysznicem brudno, w saunie smród, a jeśli chodzi o sprzęt to część jest zepsuta 🤬🤬','Mega lans jeśli nie masz obcisłych ciuchów i nie napijesz sobie skarpety w kroku to będziesz poczegany za leszcza😑🙄😐',
        'Nie fjniw i syf','Śmierdzi zdechłym szczurem','Nie polecam. Jeżeli nie jesteś znajomym kogoś z obsługi, to miejsce nie jest dla Ciebie.',
        'Bardzo ładny klub sprzęt i pływalnia super.Ale bardzo nie miłe sprzataczki brudno i syf aż nie chce mi się tam chodzić 🤮🤢🤮🤧. Prysznicem zagrzybione proszę o zmianę na Polski zespół sprzatajacy','Stare, ale sprawne sprzęty. Brak klimy i szatnia w toalecie','Silownia całkiem przyjemna',];

        $gym_review3 = ['Ogólnie klub wyglada fajnie, w szatniach czysto, sauna super :)','Silownia fajnie wyposazona ale personel do bani brak kontaktu pomocy czy czegokolwiek 😫😫','Dobrze wyposażony klub, ładne widoki, fajni prowadzący, ale obsługa bywa często niemiła.',
        'Brudno i na salach niezbyt dobrze pachnie...🤢🤢🤮','Miejsce ok.','Szkoda ze tylko abonamenty....🤬',
        'Fajna siłownia, miła obsługa. Trochę mało urządzeń. Fajne zajęcia. Będę musiał tu wrócić.😁','Dałbym więcej gwiazdek gdyby zainwestowali w nowy sprzęt','Spory wybór sprzętu do ćwiczeń i zajęć grupowych, ale na sali ćwiczący zostawiony sam sobie',
        'Jedna z lepszych siłowni, dobry sprzęt oraz dobrzy fachowcy :)','Lokal i dobór sprzętu super','I fabryce formy wszyscy wiedzą. Ta w Suchym Lesie taka se. Dużo urządzeń popsutych.',];

        $gym_review4 = ['Dobrze zorganizowana siłownia ze świetną lokalizacją😁😁.','Pomieszczenia podzielone na sekcje siłownia cardio stretching itd. Przestronne szatnie prysznice niestety brak sauny. No i minus za sprzęt uszkodzony który długo bywa naprawiany. I za to 4 a nie 5 gwiazdek','Fajna siłownia :))',
        'Fajna siłownia masa sprzętu i maszyn można konkretnie poćwiczyć choć w niektórych godzinach jest naprawdę tłoczno i trzeba czekać aż ktoś skończy lub ćwiczyć na zmianę.','Czysto, sympatyczna obsługa, nowoczesny sprzęt, gustowny wystrój. Trochę brakuje miejsca.','Duży wybór urządzeń do ćwiczenia',
        'Bez zastrzeżeń. Dużo sprzętu, Dużo maszyn, siłownia bardzo przestrzenna gdzie personel dba o czystość i porządek 😄😄. Jedyne czego brakuje to chociażby bufetu.','wszystko fajnie tylko szafki by sie przydało naprawic ;)','Jest tu dużo sprzętu więc nawet w godzinach szczytu coś się znajdzie.',
        'Nowoczesny wystrój i bardzo dobry sprzęt, ciekawe cyber treningi. Niestety często jest tam zbyt duszno i brakuje środków do dezynfekcji','Super miejscówka na "wyżycie"się i spalenie mnóstwo kalorii 💪💪💪😀😍','Świetna siłownia. Czysto, duży wybór sprzętu i super atmosfera. Trenerzy zawsze pod ręką chętni do pomocy. Polecam.',];

        $gym_review5 = ['Bardzo czysto, przyjemnie, sprzęt zadbany, miła obsługa','Fantastyczne miejsce do pracy nad sobą,  ćwiczeń i fitness.','Dużo sprzętu.😄😄 Miła obsługa zawsze gotowa do pomocy. Godziny otwarcia to bajka i to za cenę karnetu w Polsce. Gorąco polecam',
        'Moim zdaniem najlepsza siłownia','Najlepsza i najnowocześniejsza siłownia w okolicy 😁😁.','Bardzo dobrze wyposażona, ogromna siłownia. Miła obsługa, duży plus za całodobowe otwarcie, nawet w dni wolne. Jednym słowem bardzo polecam, spełniła wszystkie moje oczekiwania.',
        'Dobry duzy klub z parkingiem. Duza powierzchnia ze sprzetem do treningu silowego jak i kardio.😄😄','Ładna, zadbana siłownia, dużo sprzętu, przemiła obsługa 😁.','Naprawdę bardzo duży wybór sprzętu zarówno do kardio jak i ciężarów. Całe miejsce sprytnie i ciekawie podzielone na różne strefy ćwiczeń',
        'Popsuło się przez pandemie, lecz ciężary nadal ważą tyle samo a to najważniejsze 😁😁.','obsługa bardzo miła i trenerzy którzy zawsze pomogą.','Super! Mało osób, czysto, dużo dobrego sprzętu - polecam gorąco 😄😄',];
        // echo count($gym_review1)," ",count($gym_review2)," ",count($gym_review3)," ",count($gym_review4)," ",count($gym_review5);
        
        
        
        
        
        for($i = 0; $i < 550; $i++)
        {
            $mark = rand(1,5);
            $randIndex = rand(0,count($gym_review1) - 1);
            switch ($mark) 
            {
                case 1:
                    $o = $gym_review1[$randIndex];
                    break;
                case 2:
                    $o = $gym_review2[$randIndex];
                    break;
                case 3:
                    $o = $gym_review3[$randIndex];
                    break;
                case 4:
                    $o = $gym_review4[$randIndex];
                    break;
                case 5:
                    $o = $gym_review5[$randIndex];
                    break;
            }
            $sql = "SELECT DISTINCT `gyms`.`gym_id` FROM `usr_train` JOIN `gyms` ON `usr_train`.`gym_id` = `gyms`.`gym_id` WHERE `usr_train`.`user_id` = '$i'";
            $gym_id = mysqli_fetch_row($connect -> query($sql))[0];
            echo "gym review id:$i      gym mark:$mark  descp:$o  <b>user id:</b>$i id siłowni:$gym_id<br>";

            $g = "INSERT INTO `gym_reviews` (`gym_review_id`, `gym_mark`, `gym_review_descript`,`user_id`,`gym_id`)  VALUES ($i,$mark,'$o',$i,$gym_id);";
            // $connect -> query($g);
        }
        
        /*
        */

    } 
?>

 