<?php
    session_start();
    date_default_timezone_set("Europe/Warsaw");
    if(!$id = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    $newWeight = htmlspecialchars($_POST['weight']);
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
        header("Location: ..\..\Pages\mojekonto.php?Error=$e->getMessage()");
    }   

    $newEntry = $connect->prepare("INSERT INTO `bmi`(`bmi_id`, `weight`) VALUES (:bmi_id, :weigght)");
    $newEntry->bindParam(':bmi_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $newEntry->bindParam(':weigght', $newWeight);
    $newEntry -> execute();
    
    header('Location: ..\..\Pages\mojekonto.php?progress');
    
?>