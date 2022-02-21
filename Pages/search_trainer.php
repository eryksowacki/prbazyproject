<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require_once '..\Scripts\PHP\page_look_head.php';
    ?>
    <title>Wyszukiwani trenerzy</title>
</head>
<body>
    <?php
        require_once '..\Scripts\PHP\navbar-content.php';
    ?>
    <div id="content" class="d-flex justify-content-center">
        <h2>Trenerzy personalni</h2>
        <?php
            require_once '../Scripts/PHP/connect_user.php';

            if($connect -> connect_ernno)
            {
                echo "Błędne połączenie z bazą danych";
            }
            else
            {
                

                $sql = "";
            }
        ?>
    </div>
    <footer id="footer">
        <?php
            require_once '..\Scripts\PHP\page_look_footer.php';
        ?>
    </footer>
</body>
    <?php
        require_once '..\Scripts\PHP\page_look_scripts.php';
    ?>
</html>