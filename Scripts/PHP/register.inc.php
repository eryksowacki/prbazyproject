<?php
    session_start();
    if(!isset($_POST))
    {
        header("location: ../../signup.php?errorNo=45");
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
            header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&email=$_POST[email]&emptyInput=&errorNo=6");
        }
        else
        {
            if(!isset($_POST['tos']))
            {
                header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&email=$_POST[email]&emptyInput=&errorNo=7");
            }
            if($_POST["token"] !== $_SESSION["token"])
            {
                header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&email=$_POST[email]&emptyInput=&errorNo=45");
            }
            else
            {
                if($_POST['password'] !== $_POST['checkPassword'])
                {
                    header('Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&email=$_POST[email]&emptyInput=&errorNo=8');
                }
                else
                {
                    $password = sha1($_POST['password']);
                    try
                    {
                        $connect = $connect = new PDO("mysql:dbname=id18439949_znanytrener;host=localhost;", "id18439949_znanytrenerusername", 'sy>[$Fo8]+!n^cVN');
                        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                        $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                    catch(PDOException $e)
                    {
                        $connect = null;
                        header("Location: ../../login.php?errorNo=3&PDOexept=$e->getMessage()");
                    }
                    $stmt = $connect -> prepare("SELECT `email` FROM `users` WHERE `email` LIKE :email");
                    $stmt -> execute(['email' => $_POST['email']]);
                    $rowCount = $stmt -> rowCount();
                    if($rowCount !== 0)
                    {
                        header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&email=&emptyInput=&errorNo=9");
                    }
                    else
                    {   
                        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                        {
                            header("Location: ../../signup.php?name=$_POST[name]&surname=$_POST[surname]&email=&emptyInput=&errorNo=10");
                        }
                        else
                        {
                            $asf = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
                            $result = mysqli_fetch_row($asf -> query("SELECT max(`user_id`) + 1 FROM `users`;"))[0];
                            $data = [
                                'usr_id' => $result,
                                'nme' => $_POST['name'],
                                'surname' => $_POST['surname'],
                                'email' => $_POST['email'],
                                'passwd' => $password,
                                'bmi' => $result,
                            ];
                            $stmt = $connect -> prepare("INSERT INTO `users` (`user_id`,`name`, `surname`, `email`, `password`,`bmi_id`) VALUES (:usr_id,:nme, :surname, :email, :passwd, :bmi)");
                            $stmt -> execute($data);
                            $stmt = $connect -> prepare('SELECT `user_id`, `profile_picture`, `email`, `password`, `name` FROM `users` WHERE `email` = :email');
                            $stmt -> execute(['email' => $_POST['email']]);
                            $result = $stmt -> fetch();
                            $_SESSION['name']= $result -> name;
                            $_SESSION['profile_picture']= $result -> profile_picture;
                            $_SESSION['user_id'] = $result -> user_id;
                            $connect = null;
                            header('Location: ../../index.php');
                        }
                    }
                }
            }
        }
    }
?>