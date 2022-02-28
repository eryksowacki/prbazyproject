<?php
    if(!empty($_POST) || isset($_SESSION['user_id']))
    {
        $connect = @new mysqli("localhost", "id18439949_znanytrenerusername'@'localhost", 'sy>[$Fo8]+!n^cVN', "id18439949_znanytrener");
    }
    else
    {
        header("location: ..\..\signup.php?unauthorizedAccess=1");
    }
?>