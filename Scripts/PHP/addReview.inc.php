<?php
    session_start();
    if(!$id = filter_input(INPUT_POST, 'mark', FILTER_VALIDATE_INT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    $_POST['trainer_id'] = (int) $_POST['trainer_id'];
    $_POST['mark'] = (int) $_POST['mark'];
    $_SESSION['user_id'] = (int) $_SESSION['user_id'];
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
        header('Location: ../../mojekonto.php?reviews');
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
            header("Location: ..\..\mojekonto.php?Error=$e->getMessage()");
        }
        $newReview = $connect -> prepare("INSERT INTO `trainer_reviews`(`trainer_id`, `trainer_mark`, `trainer_review_descript`, `user_id`) 
        VALUES (:trainer_id,:trainer_mark,:train_descript,:usr_id);");
        $newReview -> bindParam(':trainer_id', $_POST['trainer_id'], PDO::PARAM_INT);
        $newReview -> bindParam(':trainer_mark', $_POST['mark'], PDO::PARAM_INT);
        $newReview -> bindParam(':train_descript', $_POST['userNewReview'], PDO::PARAM_STR);
        $newReview -> bindParam(':usr_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $newReview -> execute();
        header('Location: ../../mojekonto.php?reviews');
    }
?>