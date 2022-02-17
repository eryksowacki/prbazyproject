<?php
    // if(!isset($_POST['submitSub']) || !isset($_POST['login']) && !isset($_POST['password']))
    // {
        // header('Location: ../Pages/index.php');
    // }
    // else
    // {
    //     $login = $_POST['login'];
    //     $password = sha1($_POST['password']);
    //     require_once 'connect_user.php';

    //     if($connect -> connect_errno)
    //     {
    //         echo "Błędne połączenie z bazą danych!";
    //     }
    //     else
    //     {
    //         $sql = "SELECT `email` FROM `users` where `email` like '$login'";

    //         $result = $connect -> query($sql);

    //         if($result -> num_rows == 0)
    //         {
    //             echo "Podany login nie istnieje w bazie danych.";
    //         }
    //         else
    //         {
    //             $sql = "SELECT `password` from `users` where `email` like '$login'";

    //             $result = $connect -> query($sql);

    //             if($dbPassword = $result -> fetch_assoc())
    //             {
    //                 if($dbPassword['password']===$password)
    //                 {
    //                     echo "Pomyślnie zalogowano.";
    //                 }
    //                 else
    //                 {
    //                     echo "Błędne hasło.";
    //                 }
    //             }
    //         }
    //         $connect -> close();
    //     }
    // }

    session_start();
    if(!isset($_POST))
    {
        // header("location: ../../Pages/login.php?unauthorizedAccess=1");
    }
    else
    {
        $i = 0;
        foreach($_POST as $key => $value) 
        {
            $_POST[$key] = htmlspecialchars(trim($value));
            $value = trim($value);

            if(isset($value) && !empty($value))
            {
                $i++;
            }
        }
        if(count($_POST) != $i)
        {   
            // header("Location: ../../Pages/login.php?email=$_POST[email]&emptyInput=");
        }
        else
        {
            if($_POST['token'] !== $_SESSION['token'])
            {
                header("Location: ../../Pages/login.php?nonAuthorizedToken=1");
            }
            else
            {
                try
                {
                    $connect = new PDO("mysql:host=localhost;dbname=znany_trener", "root", "");
                    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e) 
                {
                    $connect = null;
                    header("Location: ../../Pages/login.php?Error=$e->getMessage()");
                }
    
                $email = $_POST["email"];
                $userPassword = sha1($_POST['password']);

                echo "$email $userPassword<br>";
                // require_once "connect_user.php";   
                
                $sqlQuery = 'SELECT * FROM `users` WHERE `email` = :email';
                $stmt = $connect -> prepare($sqlQuery);
                $stmt -> execute(['email' => $email]);
                $rowCount = $stmt -> rowCount();
                if($rowCount !== 1)
                {
                    $connect = null;
                    header('Location: ../../Pages/login.php?noEmail=1');
                }
                else
                {
                    $result = $stmt -> fetch();
                    if($userPassword !== $result -> password)
                    {
                        $connect = null;
                        header('Location: ../../Pages/login.php?wrongPasswd=1');
                    }
                    else
                    {             
                        $_SESSION['name']= $result -> name;
                        $_SESSION['profile_picture']= $result -> profile_picture;
                        $_SESSION['user_id'] = $result -> user_id;
                        $connect = null;
                        header('Location: ../../Pages/index.php');
                    }
                }
            }
        }
    }
    
?>