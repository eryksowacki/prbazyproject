<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
        require_once '..\Scripts\PHP\page_look_head.php';
    ?>
    <title>Trenerzy</title>
</head>
<body>
    <?php
        require_once '..\Scripts\PHP\navbar-content.php';
    ?>
    <div id="content" class="d-flex justify-content-center">
        <h2>Szukaj trenera personalnego</h2>
            <form action="search_trainer.php" method="post" class="d-flex">
                <h4>Siłownia:</h4>
			<select name="gymName">
				<?php
					require_once '../Scripts/PHP/connect_user.php';
				    	$gymQuery = "SELECT DISTINCT `gym_name` FROM `gyms` ORDER BY `gym_id` ASC";
						$result = $connect -> query($gymQuery);
					    	while($currentRow =  mysqli_fetch_row($result))
						    {
							    echo "<option value='$currentRow[0]'>$currentRow[0]</option>";
						    }
				?>
			</select>
            <h4>Miasto:</h4>
			<select name="city">
				<?php
					$cityQuery = "SELECT DISTINCT `city` FROM `gyms` ORDER BY `gym_id` ASC";
					$result = $connect -> query($cityQuery);
					while($currentRow =  mysqli_fetch_row($result))
					{
						echo "<option value='$currentRow[0]'>$currentRow[0]</option>";
					}
				?>
			</select>
            <h4>Specjalizacja:</h4>
            <select name="specialization">
                <?php
                    $specQuery = "SELECT DISTINCT `specialization` FROM `trainers`";
                    $result = $connect -> query($specQuery);
                    while($specialization = mysqli_fetch_row($result))
                    {
                        echo "<option value='$specialization[0]'>$specialization[0]</option>";
                    }
                ?>
            </select>
            <h4>Ocena:</h4>
            <input type="text" placeholder="od:" name="minTrainerMark">
            <input type="text" placeholder="do:" name="maxTrainerMark">
            <h4>Cena:</h4>
            <input type="text" placeholder="od" name="minPrize"> 
            <input type="text" placeholder="do:" name="maxPrize">
            <input type="submit" value="Szukaj">
        </form>
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