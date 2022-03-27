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
            header("Location: ../../login.php?errorNo=6");
        }
        else
        {
            if($_POST['token'] !== $_SESSION['token'])
            {
                header("Location: ../../login.php?errorNo=4");
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
                    header("Location: ../../login.php?errorNo=3&PDOexept=$e->getMessage()");
                }
    
                $email = $_POST["email"];
                $userPassword = sha1($_POST['password']);                
                $sqlQueryUsers = 'SELECT * FROM `users` WHERE `email` LIKE :email';
                $stmt = $connect -> prepare($sqlQueryUsers);
                $stmt -> execute(['email' => $email]);

                $sqlQueryTrainers = 'SELECT * FROM `trainers` WHERE `email` LIKE :email';
                $stmtTrainers = $connect -> prepare($sqlQueryTrainers);
                $stmtTrainers -> execute(['email' => $email]);

                $resgsd = $stmtTrainers -> fetch(PDO::FETCH_ASSOC);
                var_dump($resgsd);
                foreach ($resgsd as $key => $value) {
                    echo $resgsd[$key],"<br>";
                }


                $rowCount = $stmt -> rowCount();
                if($rowCount !== 1)
                {
                    $connect = null;
                    header('Location: ../../login.php?errorNo=1');
                }
                else
                {
                    $result = $stmt -> fetch();
                    if($userPassword !== $result -> password)
                    {
                        $connect = null;
                        header('Location: ../../login.php?errorNo=2');
                    }
                    else
                    {             
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
    
?>