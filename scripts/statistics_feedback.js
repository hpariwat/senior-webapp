// Variables
const base_url=window.location.origin;
const lang=document.querySelector('#lang').value;
let loaded_qid=[];
$(document).ready( function () {
	let questionID;
	let questionTitle;
	let myPanel;
	function viewStats()
	{
		jQuery('.question-title').html(questionTitle);
		if(lang==='en') {
			myPanel = $(
				'<div class="row pb-3">Always<div class="myProgress d-inline"><div class="myBar" id="barNr4_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Often<div class="myProgress"><div class="myBar" id="barNr3_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Sometimes<div class="myProgress"><div class="myBar" id="barNr2_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Seldom<div class="myProgress"><div class="myBar" id="barNr1_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Never<div class="myProgress"><div class="myBar" id="barNr0_' + questionID + '"></div></div></div>' +
				'<div class="row" id ="avg_score_' + questionID + '"></div>');
		}
		else {
			myPanel = $(
				'<div class="row pb-3">Altijd<div class="myProgress d-inline"><div class="myBar" id="barNr4_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Vaak<div class="myProgress"><div class="myBar" id="barNr3_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Soms<div class="myProgress"><div class="myBar" id="barNr2_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Zelden<div class="myProgress"><div class="myBar" id="barNr1_' + questionID + '"></div></div></div>' +
				'<div class="row pb-3">Nooit<div class="myProgress"><div class="myBar" id="barNr0_' + questionID + '"></div></div></div>' +
				'<div class="row" id ="avg_score_' + questionID + '"></div>');
		}
		$('#contentPanel').empty();
		myPanel.appendTo('#contentPanel');
		$('#view-stats').modal('show');
	}
	const table =  $('#myTable').DataTable({
		scrollY: '65vh', // scrollable (change to 400 for fixed size)
		"bLengthChange": false, // disable show X entries
		"iDisplayLength": 50, // amount per page
		responsive: true,
		"paging": false, // only one page
		"info": false,
		scrollCollapse: true,
		"processing": true,
		"deferRender": true,
		'stateSave': false,
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false,
				"searchable": false
			},
			{
				"targets": [ 2 ],
				"visible": false
			}
		]
	});

	$('#searchInput').on( 'keyup', function () {
		table.search( this.value ).draw();
	} );
	
	$('#myTable tbody').on('click', 'td.details-control', function () {
		const tr = $(this).closest('tr');
		const row = table.row( tr );
		questionTitle = row.data()[1];
		questionID = row.data()[2];
		viewStats();
		getAnswers(questionID);
	} );
} );
function getAnswers(id_question) {
	if (alreadyLoaded(id_question)) {
	}
	else{
		$.ajax({
			url: base_url + "/index.php/statistics_Feedback_CA/getData", // send request to insert method
			type: "post", // send data to server
			data: {qid: id_question}, // define which data we send to server
			success: function (result) { // callback function if the request has completed successfully
				const question_results = JSON.parse(result);
				const tot = calculateTot(question_results);
				showStats(id_question,question_results,tot);
				let data = {
					qid: id_question,
					answer_res: question_results,
					answer_tot: tot
				};
				loaded_qid.push(data);
			},
			error: function (ts) {
				console.log("Something went wrong please contact the help desk in the settings");
				console.log(ts.responseText);
			}
		})
	}
}
function calculateTot(results) {
	let toReturn=0;
	for(let i=0;i<results.length;i++){
		toReturn+=parseInt(results[i].count);
	}
	return toReturn;
}
function alreadyLoaded(id_question){
	for(let i=0; i<loaded_qid.length;i++){
		if(loaded_qid[i].qid===id_question){
			showStats(id_question,loaded_qid[i].answer_res,loaded_qid[i].answer_tot);
			return true
		}
	}
	return false;
}
function showStats(quest_id, quest_res, total) {
	for (let k = 0; k <quest_res.length; k++) {
		const number = quest_res[k].score;
		const value = (quest_res[k].count) * (100 / total);
		document.querySelector("#barNr" + number + "_" + quest_id).style.width = value + "%"
	}
}
