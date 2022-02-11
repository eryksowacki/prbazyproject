<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="../node_modules/chart.js/dist/chart.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .chart{
            display: flex;
            align-items:center;
            justify-content:center; 
            height:50%; 
            width: 30%;
        }
    </style>
</head>
<body>
    <div class="chart">
        <canvas id="myChart" style="width:400px; height:400px"></canvas>
    </div>

</body>
</html>
<script>const weight = [];const date = [];</script>
<?php
    session_start();
    require_once 'connect_user.php';
    $_SESSION['user_id'] = 0;
    $sql = "SELECT `weight` as `w`, `date` as `d` FROM `bmi` `b` where `bmi_id` = $_SESSION[user_id];";
    $result = $connect -> query($sql);
    echo "<script>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "weight.push(".$row['w']."); date.push('".substr($row['d'], 0, 10)."'); ";
        $git = $row['d'];
    }
    echo "</script>";
?>
<script src="chartApp.js"></script>
<script>

    const myChart = new Chart(canvas, userProgressChart);
    addData(myChart, date, weight);
</script>
