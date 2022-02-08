<?php
    if(!isset($_POST))
    {
        header("location: ../Pages/signup.php?unauthorizedAccess=1");
    }
    else
    {
        $i = 0;
        foreach($_POST as $key => $value) 
        {
            $_POST[$key] = trim($value);
            $value = trim($value);

            if(!isset($value) || !empty($value))
            {
                $i++;
            }
        }
                if(count($_POST) != 8)
        {
            header("Location: ../Pages/signup.php?name=$_POST[name]&surname=$_POST[surname]&age=$_POST[age]&email=$_POST[email]&emptyInput=");
        }
        else
        {
            session_start();
            if($_POST["token"] !== $_SESSION["token"])
            {
                header("Location: ../Pages/signup.php?nonAuthorizedToken=1");
            }
            else
            {

                if($_POST['password'] !== $_POST['checkPassword'])
                {
                    header('Location: ../Pages/signup.php?invalidPasswd=1');
                }
                else
                {
                    $password = sha1($_POST['password']);

                    require_once 'connect_user.php';
                    
                    if($connect -> connect_errno)
                    {
                        echo "Błędne połączenie z bazą danych.";
                    }          
                    else
                    {
                        $sql = "SELECT `email` FROM `users` where `email` like '$_POST[email]'";
                        
                        $result = $connect -> query($sql);

                        if($result -> num_rows !== 0)
                        {
                            header("Location: ../Pages/signup.php?name=$_POST[name]&surname=$_POST[surname]&age=$_POST[age]&email=&emptyInput=&takenEmail=");
                        }
                        else
                        {   
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                                header("Location: ../Pages/signup.php?name=$_POST[name]&surname=$_POST[surname]&age=$_POST[age]&email=&emptyInput=&emailValidateError=");
                            }
                            $result = mysqli_fetch_row($connect -> query("SELECT max(`bmi_id`)+1 from `users`;"))[0];
                            $sql = "INSERT INTO `users` (`name`, `surname`, `age`, `email`, `password`,`bmi_id`) VALUES ('$_POST[name]', '$_POST[surname]', '$_POST[age]', '$_POST[email]', '$password','$result')";

                            $result = $connect -> query($sql);
                            
                            header('Location: ../Pages/index.php');
                        }
                    }   
                }
            }
        }
    }
    ?>