<?php
    session_start();
    $_GET['gym_review_id'] = (int) $_GET['gym_review_id'];
    if(!$id = filter_input(INPUT_GET, 'gym_review_id', FILTER_VALIDATE_INT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    try{
        $connect = $connect = new PDO("mysql:dbname=id18439949_znanytrener;host=localhost;", "id18439949_znanytrenerusername", 'sy>[$Fo8]+!n^cVN');
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) 
    {
        $connect = null;
        header("Location: ../../mojekonto.php?Error=$e->getMessage()");
    }   

    $userTrainersId = $connect->prepare("SELECT DISTINCT  `gym_review_id` FROM `gym_reviews` WHERE `user_id` = :user_id");
    $userTrainersId -> execute(['user_id' => $_SESSION['user_id']]);
    $gymReviewId = $userTrainersId -> fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
    foreach ($gymReviewId as $key => $value) 
    {
        if($value['gym_review_id'] !== $id)
        {
            $i++;
        }
        else
        {
            $tmp = $connect->prepare("SELECT `gym_review_id` FROM `gym_reviews` WHERE `gym_review_id` = :gym_review_id");
            $tmp -> execute(['gym_review_id' => $id]);
            $result = $tmp -> fetchAll(PDO::FETCH_ASSOC);
            $reviewId = $result[0]['gym_review_id'];
            $userTrainersId = $connect -> prepare("DELETE FROM `gym_reviews` WHERE `gym_review_id` = :gym_review_id");
            $userTrainersId -> execute(['gym_review_id' => $reviewId]);
            header('Location: ../../mojekonto.php?gym_reviews');
        }
    }
    $connect = null;
    if(count($gymReviewId) === $i)
    {
        header('Location: ../../index.php');
        exit();
    }
?>