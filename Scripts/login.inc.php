<?php
    if(!isset($_POST['submitSub']) || !isset($_POST['login']) && !isset($_POST['password']))
    {
        header('Location: ../Pages/index.php');
    }
    else
    {
        $login = $_POST['login'];
        $password = sha1($_POST['password']);
        require_once 'connect_user.php';

        if($connect -> connect_errno)
        {
            echo "Błędne połączenie z bazą danych!";
        }
        else
        {
            $sql = "SELECT `email` FROM `users` where `email` like '$login'";

            $result = $connect -> query($sql);

            if($result -> num_rows == 0)
            {
                echo "Podany login nie istnieje w bazie danych.";
            }
            else
            {
                $sql = "SELECT `password` from `users` where `email` like '$login'";

                $result = $connect -> query($sql);

                if($dbPassword = $result -> fetch_assoc())
                {
                    if($dbPassword['password']===$password)
                    {
                        echo "Pomyślnie zalogowano.";
                    }
                    else
                    {
                        echo "Błędne hasło.";
                    }
                }
            }
            $connect -> close();
        }
    }
?>