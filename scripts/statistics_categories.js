// VARIABLES
const base_url=window.location.origin;
// CHART
const x_labels=[];
const data={labels:x_labels};
let graph= document.querySelector('#mainGraph');
let mainChart = new Chart(graph, {
	type: 'bar',
	data: data,
	options: {
		legend: {
			display: true,
		},
		scales: {
			yAxes: [{
				ticks: {
					suggestedMin: 0,
					suggestedMax: 100
				}
			}]
		}
	}
});
//MAIN
jQuery(document).ready( function () {
	loadCategoryData();
});

//FUNCTIONS
function loadCategoryData() {
	let now=new Date();
	const currentYear= now.getFullYear();
	const currentMonth= now.getMonth()+1;// Month is total 0-11

	$.ajax({
		url: base_url + "/index.php/statistics_CA/getCatStats", // send request to insert method
		type: "post", // send data to server
		data: {
			year: currentYear,
			month: currentMonth
		}, // define which data we send to server
		success: function (result) { // callback function if the request has completed successfully
			const cat_result = JSON.parse(result);
			const cat_scores=[];
			for(let i=0; i<cat_result.length;i++){
				x_labels[i]=cat_result[i].topic;
				cat_scores[i]=(cat_result[i].score*20).toFixed(2);
			}
			const newDataset = {
				label: "Ter Vlierbeke",
				data: cat_scores,
				backgroundColor: '#0288D1'// todo
			};
			data.datasets.push(newDataset);
			mainChart.update();
			addNational();
		},
		error:function (result) {
			console.log("Something went wrong fetching the data, please contact help desk in the settings");
			console.log(result);
		}
	})
}
function addNational() {
	const national=[50,44,30,40,50,30,33,35,20,25,20];
	const newDataSet={
		label: "Nationaal gemiddelde",// todo
		data: national,
		backgroundColor: "#C48460"
	};
	data.datasets.push(newDataSet);
	mainChart.update();
}

