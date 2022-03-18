function getRandomFillColor() {
	let o = Math.round, r = Math.random, s = 255;
	return ('rgba(' +o(r() * s) +',' +o(r() * s) +',' +o(r() * s) +',' +r().toFixed(1) +')');
}
function addData(chart, label, data) {
	chart.data.datasets.forEach((dataset) => {
		for (let i = 0; i < data.length; i++) {
			chart.data.labels.push(label[i]);
			dataset.data.push(data[i]);
		}
	});
	chart.update();
}
let delayed;
const canvas = document.getElementById('myChart').getContext('2d');
let gradiant = canvas.createLinearGradient(0, 0, 0, 400);
let frstStop = getRandomFillColor();
let secndStop = getRandomFillColor();
gradiant.addColorStop(0, frstStop);
gradiant.addColorStop(1, secndStop);

const userProgressChart = {
	type: 'line',
	data: {
		labels: [],
		datasets: [
			{
				labels: 'This will be hidden',
				data: [],
				borderWidth: 2,
				borderColor: getRandomFillColor(),
				fill: true,
				backgroundColor: gradiant,
				tension: 0.35,
			},
		],
	},
	options: {
		hitRadius:30,
		hoverRadius:12,
		animation: {
			onClomplete: () => {
				delayed: true;
			},
			delay: (context) => {
				let delay = 0;
				if(context.type === 'data' && context.mode === 'default' && !delayed){
					delay = context.dataIndex * 300 + context.dataIndex * 100;
				}
				return delay;
			},
		},
		plugins: {
			legend: {
				display: false,
			},
		},
		scales: {
			x: {
				title: {
					color: 'black',
					text: 'Dzień',
				},
			},
			y: {
				ticks: {
					callback: function (value) {
						return value + 'kg';
					},
				},
			},
		},
		
	},
};
let myChart = new Chart(canvas, userProgressChart);
addData(myChart, date, weight);
