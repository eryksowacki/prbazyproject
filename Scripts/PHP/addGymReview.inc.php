<?php
    session_start();
    if(!$id = filter_input(INPUT_POST, 'mark', FILTER_VALIDATE_INT)) 
    {
        header("HTTP/2.0 400 Bad Request");
        exit();
    }
    $_POST['gym_id'] = (int) $_POST['gym_id'];
    $_POST['mark'] = (int) $_POST['mark'];

    $i = 0;
    foreach ($_POST as $key => $value) 
    {
        $_POST[$key] = htmlspecialchars($_POST[$key]);
        if(isset($value))
        {
            $i++;
        }
        echo $_POST[$key],"<br>";
    }
    if(count($_POST) != $i)
    {
        header('Location: ../../mojekonto.php?gym_reviews');
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
            header("Location: ../../mojekonto.php?Error=$e->getMessage()");
        }
        $lastIds = $connect -> prepare("SELECT `gym_review_id` FROM `gym_reviews` order by `gym_review_id` DESC limit 1");
        $lastIds -> execute();
        $result = $lastIds -> fetchAll(PDO::FETCH_ASSOC);
        $reviewId = $result[0]['gym_review_id'];
        $data = [
            'gym_rev_id' => $reviewId + 1,
            'usr_id' => $_SESSION['user_id'],
            'gym_id' => $_POST['gym_id'],
            'gym_rev_descript' => $_POST['userNewReview'],
            'gym_mark' => $_POST['mark'],
        ];
        $newReview = $connect -> prepare("INSERT INTO `gym_reviews` (`gym_review_id`,`gym_mark`, `gym_review_descript`, `user_id`, `gym_id`)
        VALUES (:gym_rev_id,:gym_mark,:gym_rev_descript,:usr_id,:gym_id);");
        $newReview -> execute($data);
        header('Location: ../../mojekonto.php?gym_reviews');
    }
?>