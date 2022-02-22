<?php
    session_start();
    if(!$id = filter_input(INPUT_POST, 'mark', FILTER_VALIDATE_INT)) 
    {
        // header("HTTP/2.0 400 Bad Request");
        // exit();
    }
    var_dump($_POST);

    foreach ($_POST as $key => $value) 
    {
        $_POST[$key] = htmlspecialchars($_POST[$key]);
    }
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

    $newReview = $connect->prepare("INSERT INTO `trainer_reviews`(`trainer_id`, `trainer_mark`, `trainer_review_descript`, `user_id`) 
    VALUES (:trainer_id,:trainer_mark,:train_descript,:usr_id);");
    $newReview->bindParam(':trainer_id', $_POST['trainer_id'], PDO::PARAM_INT);
    $newReview->bindParam(':trainer_mark', $_POST['mark'], PDO::PARAM_INT);
    $newReview->bindParam(':train_descript', $_POST['train_descript'], PDO::PARAM_STR);
    $newReview->bindParam(':usr_id', $_SESSION['user_id'], PDO::PARAM_INT);



    $newReview -> execute();
    // header('Location: ..\..\Pages\mojekonto.php?reviews');
    


?>