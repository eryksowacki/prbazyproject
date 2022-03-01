<form action="myBmi.php" method="post">
    Wzrost: <input type="number" name="height" id="height"> <br> <br>
    <input type="submit" value="Wyślij">
</form>

<?php
    $connect = new mysqli("localhost","id18439949_znanytrenerusername",'sy>[$Fo8]+!n^cVN',"id18439949_znanytrener");

    if($connect -> connect_errno)
    {
        echo "Błędne połączenie z bazą danych";
    }
    else
    {
        $sql = "SELECT `weight` from `bmi` inner join `users` on `bmi`.`bmi_id`=`users`.`bmi_id` where `users`.`user_id` = 0 order by `date` desc limit 1";
        
        $result = $connect -> query($sql);

        while($weight = $result -> fetch_assoc())
        {
            echo "<script>const weight = $weight[weight]</script>";
        }
    }
?>
<script>
    function Bmi()
    {
        const height = document.getElementById('height').value;

        const bmi = height / pow(weight, 2);
    }
</script>