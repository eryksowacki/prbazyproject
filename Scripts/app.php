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
    <div style="width: 500px">
        <canvas id="iii" width="400" height="200"></canvas>
     </div>
</body>
</html>
<?php
    require_once 'connect_user.php';
    $sql = "Select "
?>
<script>
    
    const userProgressChart = {
        type: 'line',
        data: 
        {
            labels: ['2020-11-12', '2020-11-15','2020-11-17', '2020-11-17', '2020-11-28', '2020-12-01', '2020-12-17'],
            datasets: 
            [{
                labels: "This will be hidden",
                data: [86,85,87, 90, 85, 84, 81],
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
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: 100,
                    
                    }
                }],

            }
        }
    };
    const canvs = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(canvs, userProgressChart);
</script>
