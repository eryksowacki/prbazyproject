<?php
    session_start();
    var_dump($_FILES);
    if(!isset($_FILES))
    {
        header("location: ../../mojekonto.php?personalInfo=0");
    }
    else
    {
        $i = 0;
        foreach($_POST as $key => $value) 
        {
            $_POST[$key] = htmlspecialchars(trim($value));
            $value = trim($value);

            if(isset($value) && !empty($value))
            {
                $i++;
            }
        }
        if(count($_POST) != $i)
        {   
            header("Location: ../../mojekonto.php?personalInfo=0");
        }
        else
        {
            $target_dir = "../../Images/USER IMAGES/";
            $target_file = $target_dir.basename($_FILES["file"]["name"]);
            $tmp = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if(isset($_POST["submit"])) 
            {
                $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");
                $query = "SELECT `profile_picture` FROM `users` WHERE `user_id` = $_SESSION[user_id]";
                $result = $connect -> query($query);
                $user_image = mysqli_fetch_row($result)[0];
                if($user_image != NULL)
                {   
                    unlink($target_dir.$user_image);
                    $query = "UPDATE `users` SET `profile_picture`= NULL  WHERE `user_id` = $_SESSION[user_id]";
                    $result = $connect -> query($query);
                }
                
                $check = getimagesize($_FILES["file"]["tmp_name"]);

                if($check !== false) 
                {
                    $tmp = 1;
                }
                else 
                {
                    header('Location: ../../mojekonto.php?personalInfo=0&imgSize=1');
                }     
                if($_FILES["file"]["size"] > 16000000) 
                {
                    header('Location: ../../mojekonto.php?personalInfo=0&imgSize=1');
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) 
                {
                    header('Location: ../../mojekonto.php?personalInfo=ext');
                } 
                else 
                {
                    $user_image = htmlspecialchars($_SESSION['user_id'].".".$imageFileType);
                    $_FILES["file"]["name"] = $user_image;
                    $target_file = $target_dir.$user_image;
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
                    {
                        $user_image = htmlspecialchars(basename($_FILES["file"]["name"]));
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
                            header("Location: ../../mojekonto.php?personalInfo=0?Error=$e->getMessage()");

                        }
                        $data = [
                            'usr_id' => $_SESSION['user_id'],
                            'user_img' => $_FILES["file"]["name"],
                        ];
                        $stmt = $connect -> prepare("UPDATE `users` SET `profile_picture` = :user_img  WHERE `user_id` = :usr_id");
                        $stmt -> execute($data);
                        $_SESSION['profile_picture'] = $_FILES["file"]["name"];
                        $connect = null;
                        header('Location: ../../mojekonto.php?personalInfo=1');
                    }

                    else 
                    {
                        header('Location: ../../mojekonto.php?personalInfo=0');
                    }
                }       
            }
        }
    }
?>