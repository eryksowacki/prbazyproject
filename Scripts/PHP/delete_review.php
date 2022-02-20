<?php
    session_start();
    if(!$id = filter_input(INPUT_GET, 'review_id', FILTER_VALIDATE_INT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    try{
        $connect = new PDO("mysql:host=localhost;dbname=znany_trener", "root", "");
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e) 
    {
        $connect = null;
        header("Location: ../../Pages/login.php?Error=$e->getMessage()");
    }   

    $userTrainersId = $connect->prepare("SELECT DISTINCT `review_id` FROM `trainer_reviews` WHERE `user_id` = :user_id");
    $userTrainersId -> execute(['user_id' => $_SESSION['user_id']]);
    $usersReviewId = $userTrainersId -> fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
    // USER ID = 0
    foreach ($usersReviewId as $key => $value) 
    {
        // USERS TRAINERS
        if($value['review_id'] !== $id)
        {
            $i++;
        }
        else
        {
            $tmp = $connect->prepare("SELECT `review_id` FROM `trainer_reviews` WHERE `review_id` = :review_id");
            $tmp -> execute(['review_id' => $id]);
            $result = $tmp -> fetchAll(PDO::FETCH_ASSOC);
            $reviewId = $result[0]['review_id'];
            echo $reviewId;
            $userTrainersId = $connect -> prepare("DELETE FROM `trainer_reviews` WHERE `review_id` = :review_id");
            $userTrainersId -> execute(['review_id' => $reviewId]);
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }
    }
    $connect = null;
    if(count($usersReviewId) === $i)
    {
        header('Location: ../../Pages/index.php');
        exit();
    }
?>