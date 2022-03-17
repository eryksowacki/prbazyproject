<?php
    session_start();
    if(!isset($_POST))
    {
        // header("location: ../../mojekonto.php?errorNo=1");
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
        var_dump($_POST);
        if(count($_POST) != $i)
        {
            // header("Location: ../../mojekonto.php?errorNo=1");
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
            $data = [
                'usr_id' => $_SESSION['user_id'],
                'email' => $_POST['email'],
            ];
            $stmt = $connect -> prepare("UPDATE `users` SET `email` = :email WHERE `user_id` = :usr_id");
            $stmt -> execute($data);
            $connect = null;
            header('Location: ../../mojekonto.php?personalInfo=1');
        }
    }`