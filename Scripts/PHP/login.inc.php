<?php
    session_start();
    if(!isset($_POST))
    {
        header("location: ../../login.php?unauthorizedAccess=1");
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
            header("Location: ../../login.php?email=$_POST[email]&emptyInput=");
        }
        else
        {
            if($_POST['token'] !== $_SESSION['token'])
            {
                header("Location: ../../login.php?nonAuthorizedToken=1");
            }
            else
            {
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
                    header("Location: ../../login.php?Error=$e->getMessage()");
                }
    
                $email = $_POST["email"];
                $userPassword = sha1($_POST['password']);                
                $sqlQuery = 'SELECT * FROM `users` WHERE `email` = :email';
                $stmt = $connect -> prepare($sqlQuery);
                $stmt -> execute(['email' => $email]);
                $rowCount = $stmt -> rowCount();
                if($rowCount !== 1)
                {
                    $connect = null;
                    header('Location: ../../login.php?noEmail=1');
                }
                else
                {
                    $result = $stmt -> fetch();
                    if($userPassword !== $result -> password)
                    {
                        $connect = null;
                        header('Location: ../../login.php?wrongPasswd=1');
                    }
                    else
                    {             
                        $_SESSION['name']= $result -> name;
                        $_SESSION['profile_picture']= $result -> profile_picture;
                        $_SESSION['user_id'] = $result -> user_id;
                        $connect = null;
<<<<<<< HEAD
                        header('Location: ../../Pages/index.php');
=======
                        header('Location: ../../index.php');
                        
>>>>>>> bsBranch
                    }
                }
            }
        }
    }
    
?>