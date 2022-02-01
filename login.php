<?php
    if(isset($_POST['login']) && isset($_POST['password']))
    {
        $login = $_POST['login'];
        $password = sha1($_POST['password']);
    }
?>