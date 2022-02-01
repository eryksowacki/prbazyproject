<?php
    if(empty($_POST['name']) && empty($_POST['surname']) && empty($_POST['age']) && empty($_POST['email']) && empty($_POST['password']) && empty($_POST['checkPassword']))
    {
        if($_POST['password'] === $_POST['checkPassword'])
        {
            $password = sha1($_POST['password']);

            require_once 'connect.php';
            
            if(!$connect -> connect_errno)
            {
                $sql = "SELECT `email` FROM `customers` where `email` like '$_POST[email]'";
                
                $result = $connect -> query($sql);

                if($result -> num_rows !== 0)
                {
                    echo "Użytkownik o takim e-mailu istnieje już w bazie!";
                    header('Location:javascript://history.go(-1)');
                }
                else
                {
                    $sql = "INSERT INTO `customers` (`name`, `surname`, `age`, `email`, `password`) VALUES ('$_POST[name]', '$_POST[surname]', '$_POST[age]', '$_POST[email]', '$password')";

                    $result = $connect -> query($sql);
                    
                    header('Location: index.php');
                }
            }
            else
            {
                echo "Błędne połączenie z bazą danych.";
            }
        }
        else
        {
            header('Location: signup.php?invalidPasswd=1');
        }
    }
    else
    {
        header('Location:javascript://history.go(-1)');
    }
?>