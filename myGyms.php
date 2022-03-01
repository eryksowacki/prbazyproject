<?php
    session_start();
    require_once 'Scripts/PHP/connect.php';

    if($connect -> connect_errno)
    {
        echo "Błędne połączenie z bazą danych";
    }
    else
    {
        $sql = "SELECT DISTINCT `gym_name`, `gym_jpg` from `gyms` where `gym_id` in (SELECT DISTINCT `gym_id` FROM `usr_train` WHERE `user_id` = $_SESSION[user_id])";
        
        $result = $connect -> query($sql);

        while($gym = $result -> fetch_assoc())
        {
            echo <<< GYM
            $gym[gym_name]
            <img src="../Images/WEBSITE IMAGES/$gym[gym_jpg]">
GYM;
        }
    }
?>