<?php
    session_start();
    if(!isset($_POST))
    {
        header("location: ../../trainers.php");
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
            header("Location: ../../trainers.php");
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
                header("Location: ../../trainers.php?personalInfo=$e->getMessage()");
            }
            date_default_timezone_set("Europe/Warsaw");
            $sql = "SELECT `gym_id` FROM `trainers` WHERE `trainer_id` LIKE :trainID";
            $stmt = $connect -> prepare($sql);
            $stmt -> execute(["trainID" => $_POST['trainer']]);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            $gym_id = $result['gym_id'];

            $sql = "SELECT max(`training_id`) + 1 as `smth` FROM `usr_train`";
            $stmt = $connect -> prepare($sql);
            $stmt -> execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            $train_id = $result['smth'];
            $data = [
                "usr_id" => $_SESSION['user_id'],
                "trainer_id" => $_POST['trainer'],
                "training_date" => date("Y-m-d H:i:s", strtotime('+ 14 day')),
                "train_desc" => 'Pierwszy trening',
                "gym_id" => $gym_id,
                "training_id" => $train_id,
            ];
            $addTrainer = $connect -> prepare("INSERT INTO `usr_train`(`user_id`, `trainer_id`, `training_date`, `training_descript`, `gym_id`, `training_id`) VALUES (:usr_id,:trainer_id,:training_date,:train_desc,:gym_id,:training_id)");
            $addTrainer -> execute($data);
            $connect = null;
            header("Location: ../../trainers.php");
        }
    }