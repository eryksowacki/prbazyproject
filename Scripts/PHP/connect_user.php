<?php
<<<<<<< HEAD
    $connect = @new mysqli("localhost", "root", "", "znany_trener");
=======
    if(!empty($_POST) || isset($_SESSION['user_id']))
    {
        $connect = @new mysqli("localhost", "user_znany_trener", "GxvjFNXBaCxOA9Zd", "znany_trener");
    }
    else
    {
        header("location: ..\..\Pages\signup.php?unauthorizedAccess=1");
    }
>>>>>>> userPage
?>