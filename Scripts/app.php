<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="..\node_modules\chart.js\dist\chart.min.js"></script>
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
    $_SESSION['user_id'] = 100;
    $sql = "SELECT `weight` as `w`, `date` as `d` FROM `bmi` `b` where `bmi_id` = $_SESSION[user_id];";
    $result = $connect -> query($sql);
    echo "<script>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "weight.push(".$row['w']."); date.push('".$row['d']."'); ";
    }
    echo "</script>";
?>
<script>
    
    function getRandomFillColor() 
    {
        return "#"+Math.floor(Math.random()*16777215).toString(16);
    }
    function addData(chart, label, data) 
    {
        chart.data.datasets.forEach((dataset) => {
            for(let i = 0; i < data.length; i++)
            {
                chart.data.labels.push(label[i]);
                dataset.data.push(data[i]);
            }
        });
        chart.update();
    } 
    const userProgressChart = {
        type: 'line',
        data: 
        {
            labels: [],
            datasets: 
            [{
                labels: "This will be hidden",
                data: [],
                backgroundColor: 'black',
                borderWidth: 2,
                borderColor: 'lightgreen',
                tension: 0.3,
            }],
        },
        options: 
        {
            responsive:true,
            plugins: {
                legend: {
                    display: false
                }
            },

            scales: 
            {
                x:{
                    title:{
                        color:'black',
                        display:true,
                        text:'Day',
                    },
                    
                },
                

            }
        }
    };
    const canvs = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(canvs, userProgressChart);
    addData(myChart, date, weight);


</script>
