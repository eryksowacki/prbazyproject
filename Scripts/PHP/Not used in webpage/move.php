<?php
    $connect = new mysqli("localhost","root",'',"id18439949_znanytrener");

    $sql = "SELECT `name`,`surname`,`user_id` from `users` where `name` like '$_POST[inject]' and `surname` like '$_POST[surname]'";
    $result =  mysqli_query($connect, $sql);
    var_dump($result);
    var_dump($_POST);

    while ($currRow = mysqli_fetch_array($result))
    {
        echo "$currRow[name], $currRow[surname] $currRow[user_id]<br>";
    }

?>
