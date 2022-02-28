<?php
    session_start();
    date_default_timezone_set("Europe/Warsaw");
    if(!$id = filter_input(INPUT_POST, 'gym_id', FILTER_VALIDATE_INT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    $i = 0;
    foreach ($_POST as $key => $value) 
    {
        $_POST[$key] = htmlspecialchars($_POST[$key]);
        if(isset($value) && !empty($value))
        {
            $i++;
        }
    }
    if(count($_POST) != $i)
    {
        header('Location: ../../mojekonto.php?calendar');
    }
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
        header("Location: ../../mojekonto.php?Error=$e->getMessage()");
    }
    $newTraining = $connect->prepare("INSERT INTO `usr_train` (`user_id`, `training_date`, `training_descript`, `gym_id`) 
    VALUES (:user_id, :training_date, :training_descript, :gym_id)");
    $dateTime = $_POST["date"].$_POST["time"];
    $dateTime = strtotime($dateTime);
    $dateTime = date('Y-m-d h:i:s', $dateTime);
    var_dump($_POST);
        $newTraining -> bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $newTraining -> bindParam(':training_date', $dateTime); 
    $newTraining -> bindParam(':training_descript', $_POST["descript"]);
    $newTraining -> bindParam(':gym_id', $_POST["gym_id"]);
    $newTraining -> execute();
    $connect = null;
    
    header('Location: ../../mojekonto.php?calendar');
?>