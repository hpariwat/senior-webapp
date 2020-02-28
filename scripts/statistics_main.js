//Buttons
const btn_trend = document.querySelector('#btnTrend');
const btn_top = document.querySelector('#btnTop');
//Text
let text_changer=document.querySelector("#text_trendcard");
//Parameters
const numberOfCategories = 11; // amount of cat of the inter-rai
const numberOfYears = 10;//amount of years that will be loaded
//Chart variables
const data = {labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]};
const graph = document.querySelector('#mainGraph');
const colors = ["YellowGreen", "SteelBlue", "Coral", "RebeccaPurple", "Gold", "DarkCyan", "black", "orange", "brown", "LightSeaGreen", "Peru"];
//Making chart
const mainChart = new Chart(graph, {
	type: 'line',
	data: data,
	options: {
		legend: {
			display: true,
			position: 'right',
			align: 'end'
		},
		scales: {
			yAxes: [{
				ticks: {
					suggestedMin: 0,
					suggestedMax: 100
				}
			}]
		},
		responsive: true,
		aspectRatio: 3.8,

	}
});
//Operational parameters
let base_url = window.location.origin;
let currentYear = new Date().getFullYear();
let currentMonth = new Date().getMonth() + 1;// month goes from 0-11
let cat_result = [];
let year_result = [];
let cat_result_prev = [];
let go = 0;
let loaded = false;
let lang= document.querySelector('#lang').value;

//MAIN
jQuery(document).ready(function(){
	getData();
	btn_trend.addEventListener('click' ,function(){
		if(loaded){
			if(lang==="en")
				text_changer.innerHTML = "Here the difference between this and previous month is shown, as a percentage";
			else
				text_changer.innerHTML = "Hier vindt u het verschil tussen deze maand en vorige maand voor elke categorie, voorgesteld in een percentage";
			showTrends();
			colorRanking();
			btn_top.style['text-decoration']='none';
			btn_trend.style['text-decoration']='underline';
		}
	});

	btn_top.addEventListener('click' ,function(){
		if(loaded){
				if (lang === "en")
					text_changer.innerHTML="Here the total score of each category is given and ordered. It is rated from 1-5. 1 is the lowest and 5 the highest score";
				else
					text_changer.innerHTML="Hier wordt de totale score van elke categorie weergegeven en gerangschikt in volgorde. Het is gescoord van 1-5, met 1 de laagste en 5 de hoogste score";
				showRanking();
				noColorRanking();
				btn_top.style['text-decoration']='underline';
				btn_trend.style['text-decoration']='none';
		}
	});

});

// FUNCTIONS
function getData() {// this function calls itself 10 times
	// This is data for main graph
	if (go < numberOfYears) {
		go++;
		$.ajax({
			url: base_url + "/index.php/statistics_CA/getYearStats", // send request to insert method
			type: "post", // send data to server
			data: {year: currentYear}, // define which data we send to server
			success: function (result) { // callback function if the request has completed successfully
				year_result = JSON.parse(result);
				if(currentYear===new Date().getFullYear())
				{
					makeDonuts();
				}
				showAvg(currentYear);
				currentYear--;
				getData();
			},
			error: function () {
				console.log("Something went wrong fetching data!");
			}
		})
	}
	// this is the data for the side bar
	// it should load this month and next month
	else {
	currentYear=new Date().getFullYear();
	$.ajax({
		url: base_url + "/index.php/statistics_CA/getCatStats", // send request to insert method
		type: "post", // send data to server
		data: {
			year: currentYear,
			month: currentMonth
		}, // define which data we send to server
		success: function (result) { // callback function if the request has completed successfully
			cat_result = JSON.parse(result);
			showRanking();
			loadPrevMonth();
		}
	})
}
}
function loadPrevMonth(){
	currentMonth--;
	if (currentMonth===0){//in case of January
		currentMonth=12;
		currentYear--;
	}
	$.ajax({
		url: base_url + "/index.php/statistics_CA/getCatStats", // send request to insert method
		type: "post", // send data to server
		data: {
			year: currentYear,
			month: currentMonth
		}, // define which data we send to server
		success: function (result) { // callback function if the request has completed successfully
			cat_result_prev = JSON.parse(result);
			btn_top.style['text-decoration'] = "underline";
			loaded=true;
		}
	})
}
function showAvg(curYear) { // only years where there is data will be shown
	let year_avg=[];
	for(let i=0; i<12; i++){
		if(year_result[i].avg_score!==null)
			year_avg[i]=(year_result[i].avg_score*25).toFixed(0);
		else{
			year_avg[i]=null;
		}
	}
	if(checkArray(year_avg)) {
		let newDataset = {
			label: curYear,
			fill: false,
			data: year_avg,
			backgroundColor: colors[go],
			borderColor: colors[go],
		};
		data.datasets.push(newDataset);
		mainChart.update();
	}
}
function showTrends(){
	for(let i=0;i<numberOfCategories;i++){
		for(let k=0; k<numberOfCategories;k++){
			let res_now=cat_result[i];
			let res_prev=cat_result_prev[k];
			if((res_now.topic).localeCompare(res_prev.topic)===0) {
				let cur=res_now.score;
				let prev=res_prev.score;
				if (cur > prev) {//topic of this month is higher
					let selector= document.querySelector("#plc_"+(i+1)+"_score");
					selector.innerHTML = "+"+((cur-prev)*25).toFixed(0)+"%";
					selector.style.color = "green";
				} else if (cur < prev) {//topic of this month is higher
					let selector=document.querySelector("#plc_"+(i+1)+"_score");
					selector.innerHTML = "-"+((prev-cur)*25).toFixed(0)+"%";
					selector.style.color = "red";
				}
			}
		}
	}
}
function showRanking(){
	for(let i=0; i<numberOfCategories;i++){
		let result=cat_result[i];
		document.querySelector("#plc_"+(i+1)+"_name").innerHTML=result.topic;
		document.querySelector("#plc_"+(i+1)+"_score").innerHTML=((result.score)*25).toFixed(0)+"%";
	}
}
function checkArray(array) {// checks if array is empty returns 0 if empty 1 if not
	for(let i=0; i<12; i++) {
		if (array[i] !== null) {
			return true;
		}
	}
	return false;
}
function colorRanking(){
	for(let i=0;i<numberOfCategories;i++){
		for(let k=0; k<numberOfCategories;k++){
			let res_now =cat_result[i];
			let res_prev=cat_result_prev[k];
			if((res_now.topic).localeCompare(res_prev.topic)===0) {
				if (res_now.score > res_prev.score) {//topic of this month is higher
					document.querySelector("#plc_"+(i+1)+"_score").style.color = "green";
				} else if (res_now.score < res_prev.score) {//topic of this month is higher
					document.querySelector("#plc_"+(i+1)+"_score").style.color = "red";
				}
			}
		}
	}
}
function noColorRanking() {
	for (let i=0; i<numberOfCategories;i++) {//topic of this month is higher
		document.querySelector("#plc_" + (i + 1) + "_score").style.color = "black";
	}
}
function makeDonuts() {
	$(".progress").each(function() {
		let value=0;
		if(this.id==='dntAvgScore') {
			value = (year_result[currentMonth - 1].avg_score) * 25;
			value=value.toFixed(0);
			document.querySelector('#textAvgScore').innerHTML = "" + value +"%";
		}
		if(this.id==='dntNrParticipants') {
			value = "" + (year_result[currentMonth - 1].response);
			document.querySelector('#textNrParticipants').innerHTML = "" + value;
		}
		const left = $(this).find('.progress-left .progress-bar ');
		const right = $(this).find('.progress-right .progress-bar ');

		if (value > 0) {
			if (value <= 50) {
				right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)');
			} else {
				right.css('transform', 'rotate(180deg)');
				left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)');
			}
		}
	});

	function percentageToDegrees(percentage) {
		return percentage / 100 * 360
	}
}






