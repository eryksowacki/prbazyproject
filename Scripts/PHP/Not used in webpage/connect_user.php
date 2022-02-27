<?php
    if(!empty($_POST) || isset($_SESSION['user_id']))
    {
        $connect = @new mysqli("localhost", "root", "", "znany_trener");
    }
    else
    {
        header("location: ..\..\signup.php?unauthorizedAccess=1");
    }
?>