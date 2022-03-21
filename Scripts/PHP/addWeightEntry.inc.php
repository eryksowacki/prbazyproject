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
    $data = [
        'bmi_id' =>  $_SESSION['user_id'],
        'weigght' => $newWeight,
    ];
    $newEntry = $connect->prepare("INSERT INTO `bmi`(`bmi_id`, `weight`) VALUES (:bmi_id, :weigght)");
    $newEntry -> execute($data);
    $connect = null;
    
    header('Location: ../../mojekonto.php?progress');
    
?>