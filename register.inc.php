<?php
    if(!isset($_POST))
    {
        header("Location: signup.php?unAuthorized=1");
    }
    else
    {
        if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['age']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['checkPassword']))
        {
            header("Location: signup.php?name=$_POST[name]&surname=$_POST[surname]&age=$_POST[age]&email=$_POST[email]&emptyInput=");
        }
        else
        {
            if($_POST['password'] !== $_POST['checkPassword'])
            {
                header('Location: signup.php?invalidPasswd=1');
            }
            else
            {
                $password = sha1($_POST['password']);

                require_once 'connect.php';
                
                if($connect -> connect_errno)
                {
                    echo "Błędne połączenie z bazą danych.";
                }          
                else
                {
                    $sql = "SELECT `email` FROM `customers` where `email` like '$_POST[email]'";
                    
                    $result = $connect -> query($sql);

                    if($result -> num_rows !== 0)
                    {
                        echo "Użytkownik o takim e-mailu istnieje już w bazie!";
                        header('Location: signup.php?email=1');
                    }
                    else
                    {
                        $sql = "INSERT INTO `customers` (`name`, `surname`, `age`, `email`, `password`) VALUES ('$_POST[name]', '$_POST[surname]', '$_POST[age]', '$_POST[email]', '$password')";

                        $result = $connect -> query($sql);
                        
                        header('Location: index.php');
                    }
                }
                
            }        
        }
    }
?>