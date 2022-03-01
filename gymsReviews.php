<?php
    session_start();
    require_once 'Scripts/PHP/connect.php';

    if($connect -> connect_errno)
    {
        echo "Błędne połączenie z bazą danych";
    }
    else
    {
        $sql = "SELECT `gym_name`, `gym_review_descript` from `gyms` inner join `gym_reviews` on `gyms`.`gym_id`=`gym_reviews`.`gym_id`;";
        
        $result = $connect -> query($sql);

        while($gym = $result -> fetch_assoc())
        {
            echo <<< GYM
            $gym[gym_name] <br>
            $gym[gym_review_descript] <br>
GYM;
        }
    }
?>