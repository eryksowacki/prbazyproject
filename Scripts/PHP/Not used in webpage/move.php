<?php
    
    session_start();
    $_SESSION['user_id'] = 0 ;
    $target_dir = "Images/USER IMAGES/";
    $target_file = $target_dir.basename($_FILES["file"]["name"]);
    $tmp = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    if(isset($_POST["submit"])) 
    {
        $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
        $query = "SELECT `profile_picture` FROM `users` WHERE `user_id` = $_SESSION[user_id]";
        $result = $connect -> query($query);
        $user_image = mysqli_fetch_row($result)[0];
        if($user_image != NULL)
        {   
            echo $target_dir.$user_image;
            unlink($target_dir.$user_image);
            $query = "UPDATE `users` SET `profile_picture`= NULL  WHERE `user_id` = $_SESSION[user_id]";
            $result = $connect -> query($query);
        }
        var_dump($_FILES["file"]);
        $check = getimagesize($_FILES["file"]["tmp_name"]);

        if($check !== false) 
        {
            $tmp = 1;
        }
        else 
        {
            $tmp = 0;
        }

        if(file_exists($target_file)) 
        {
            echo $target_file;
            $tmp = 0;
        }

        if($_FILES["file"]["size"] > 5000000) 
        {
            echo "Sorry, your file is too large.";
            $tmp = 0;
        }
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) 
        {
            echo "Sorry, only JPG, PNG & GIF files are allowed.";
            $tmp = 0;
        }
        
        if($tmp == 0) 
        {
            echo "Sorry, your file was not uploaded.";
        } 
        else 
        {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
            {
                echo "The file ". htmlspecialchars(basename( $_FILES["file"]["name"])). " has been uploaded.";
                $user_image = htmlspecialchars(basename( $_FILES["file"]["name"]));
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
                    // header("Location: ../../login.php?Error=$e->getMessage()");
                    echo "exepction catched";

                }
                $data = [
                    'usr_id' => $_SESSION['user_id'],
                    'user_img' => $user_image,
                ];
                echo "<br>".$user_image."<br>";

                $stmt = $connect -> prepare("UPDATE `users` SET `profile_picture` = :user_img  WHERE `user_id` = :usr_id");
                $stmt -> execute($data);
                $connect = null;
                echo "niagsg";
                // header('Location: ../../mojekonto.php?personalInfo');
            } 
            else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    }
?>