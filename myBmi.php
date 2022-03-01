<form action="myBmi.php" method="post">
    Waga: <input type="number" name="mass"> <br> <br>
    Wzrost: <input type="number" name="height"> <br> <br>
    <input type="submit" value="Wyślij">
</form>

<?php
    if(isset($_POST['mass']) && isset($_POST['height']))
    {
        $bmi = 10000 * ($_POST['mass']/pow($_POST['height'], 2));
        echo $bmi;
    }
?>