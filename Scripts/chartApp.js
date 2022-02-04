function getRandomFillColor() {
    let o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
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
const canvas = document.getElementById('myChart').getContext('2d');
let gradiant = canvas.createLinearGradient(0,0,0,400);
gradiant.addColorStop(0,getRandomFillColor());
gradiant.addColorStop(1,getRandomFillColor());

const userProgressChart = {
    type: 'line',
    data: 
    {
        labels: [],
        datasets: 
        [{
            labels: "This will be hidden",
            data: [],
            borderWidth: 2,
            borderColor: getRandomFillColor(),
            fill:true,
            backgroundColor: gradiant,
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
            y:{
                ticks:{
                    callback: function (value){
                        return value + "kg"; 
                    },
                },
            },

        },
    },
};
