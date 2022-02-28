<?php
<<<<<<< HEAD:Scripts/PHP/connect_user.php
    $connect = @new mysqli("localhost", "root", "", "znany_trener");
=======
    if(!empty($_POST) || isset($_SESSION['user_id']))
    {
        $connect = @new mysqli("localhost", "root", "", "znany_trener");
    }
    else
    {
        header("location: ..\..\signup.php?unauthorizedAccess=1");
    }
>>>>>>> bsBranch:Scripts/PHP/Not used in webpage/connect_user.php
?>