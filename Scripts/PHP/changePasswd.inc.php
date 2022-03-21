<?php
    session_start();
    if(!isset($_POST))
    {
        header("location: ../../mojekonto.php?personalInfo=0&errorNo=1");
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
            header("Location: ../../mojekonto.php?errorNo=1");
        }
        else
        {
            try
            {
                $connect = new PDO("mysql:dbname=id18439949_znanytrener;host=localhost;", "id18439949_znanytrenerusername", 'sy>[$Fo8]+!n^cVN');
                $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) 
            {
                $connect = null;
                header("Location: ../../mojekonto.php?personalInfo=0?PDOerror=$e->getMessage()");
            }
            if($_POST['newPasswd'] !== $_POST['newPasswdRepeat'])
            {
                header("Location: ../../mojekonto.php?personalInfo=0&errorNo=4");
            }
            var_dump($_POST);
            $oldData = [
                'usr_id' => $_SESSION['user_id'],
            ];
            $stmt = $connect -> prepare("SELECT `password` FROM `users` WHERE `user_id` = :usr_id");
            $stmt -> execute($oldData);
            $result = $stmt -> fetch();
            if(sha1($_POST['oldPasswd']) !== $result -> password)
            {
                header('Location: ../../mojekonto.php?personalInfo=0errorNo=5');
            }
            else
            {   
                echo sha1($_POST['newPasswd']);
                $newData = [
                    'new_passwd' => sha1($_POST['newPasswd']),
                    'usr_id' => $_SESSION['user_id'],
                ];
                $stmt = $connect -> prepare("UPDATE `users` SET `password`= :new_passwd WHERE `user_id` = :usr_id");
                $stmt -> execute($newData);
                $connect = null;
                header('Location: ../../mojekonto.php?personalInfo=1');
            }
        }
    }