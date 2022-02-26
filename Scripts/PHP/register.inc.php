<?php
    session_start();
    if(!isset($_POST))
    {
        header("location: ../../signup.php?unauthorizedAccess=1");
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
            
            header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&age=$_POST[age]&email=$_POST[email]&emptyInput=");
        }
        else
        {
            if($_POST["token"] !== $_SESSION["token"])
            {
                header("Location: ../../signup.php?nonAuthorizedToken=1");
            }
            else
            {
                if($_POST['password'] !== $_POST['checkPassword'])
                {
                    header('Location: ../../signup.php?invalidPasswd=1');
                    
                }
                else
                {
                    $password = sha1($_POST['password']);

                    $connect = $connect = new mysqli('id18439949_znanytrener','localhost;', "id18439949_znanytrenerusername", 'sy>[$Fo8]+!n^cVN');

                    if($connect -> connect_errno)
                    {
                       header("Location: ../../signup.php?dbconerr=1");;
                    }          
                    else
                    {
                        $sql = "SELECT `email` FROM `users` where `email` like '$_POST[email]'";
                        
                        $result = $connect -> query($sql);

                        if($result -> num_rows !== 0)
                        {
                            header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&age=$_POST[age]&email=&emptyInput=&takenEmail=");
                        }
                        else
                        {   
                            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                            {
                                header("Location: ../../signup.php?emailValidateError=1");
                            }
                            else
                            {
                                $result = mysqli_fetch_row($connect -> query("SELECT max(`bmi_id`)+1 from `users`;"))[0];
                                $sql = "INSERT INTO `users` (`name`, `surname`, `age`, `email`, `password`,`bmi_id`) VALUES ('$_POST[name]', '$_POST[surname]', '$_POST[age]', '$_POST[email]', '$password','$result')";
                                $result = $connect -> query($sql);
                                header('Location: ../../index.php');
                            }

                            
                        }
                    }   
                }
            }
        }
    }
?>