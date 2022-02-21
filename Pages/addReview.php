<?php
    if(!$id = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value[$key])
    }
    $newWeight = htmlspecialchars($_POST['weight']);
    $_POST['mark'];
    try
    {
        $connect = new PDO("mysql:host=localhost;dbname=znany_trener", "root", "");
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    $newReview = $connect->prepare("INSERT INTO `trainer_reviews`(`review_id`, `trainer_id`, `trainer_mark`, `trainer_review_descript`, `user_id`) 
                VALUES (NULL,':trainer_id',':trainer_mark',':train_descript','user_id');");
    $newEntry -> execute(array('trainer_id' => $_POST['trainer_id'],'trainer_mark' => $_POST['mark']],'train_descript' => $newWeight, 'user_id' => $_SESSION['user_id']));
    header('Location: ' . $_SERVER['HTTP_REFERER']."?reviews");
    


?>