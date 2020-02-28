let base_url=window.location.origin;
const lang= document.querySelector('#lang').value;
console.log(lang);
let qID;

$.ajax({
	url: base_url + "/index.php/feedback_CA/getQuestions",
	type:"GET",
	success:function(response)
	{
		console.log(response);
		let objJSON = JSON.parse(response);
		console.log(objJSON);
		let myCol = $('<div class="my-add-col col-sm-6 col-md-6 col-lg-4 pb-2 "></div>');
		let myPanel = $('<button class="card card-add my-3 mx-3 shadow text-center align-items-center" id="addQuestionPanel" data-toggle="modal" data-target="#add-question">' +
			'<i class="fas fa-plus fa-plus-add fa-2x" style="color:#f1f1f1"></i>' +
			'</button>'
		);
		myPanel.appendTo(myCol);
		myCol.appendTo('#contentPanel');
		for (let obj of objJSON) {
			console.log(obj);
			let topic = "\'" + obj.topic +  "\'";
			let question = "\'" + obj.nl +  "\'";
			let myCol = $('<div class="my-col col-sm-6 col-md-6 col-lg-4 pb-2"></div>');
			let myPanel;
			let editText = 'Edit';
			if (lang==='nl') editText = 'Aanpassen';
			myPanel = $('<div class="my-card card my-3 mx-3 shadow" id="'+obj.questionID+'Panel" style="height: 200px;">' +
				'<button type="link" class="btn btn-link edit-b" onclick="editQuestion(' + topic +  ',' + question + ',' + obj.questionID + ')">' + editText + '</button>' +
				'<div class="card-header card-header-quicklook">' +
				'<span>' + obj.topic + '</span>' +
				'<button type="button" class="btn close float-right" onclick="deleteQuestion(' + obj.questionID + ')">' +
				'<i class="fas fa-trash"></i>' +
				'</button>' +
				'</div>' +
				'<div class="card-body">' +
				'<p>' + obj.nl + '</p>' +
				'</div>' +
				'</div>');
			myPanel.appendTo(myCol);
			myCol.appendTo('#contentPanel');
		}
	}
});

function deleteQuestion(key)
{
	qID = key;
	$('#confirm-hide').modal('show');
}

function editQuestion(topic, question, id)
{
	document.getElementById('edit-topic').value = topic;
	document.getElementById('edit-question-form').value = question;
	document.getElementById('edit-id-form').value = id;
	$('#edit-question').modal('show');
}


$(document).ready( function () {
	$('#btn-confirm-hide').click(function(){
		//console.log("btn-confirm-hide" + qID);
		let selectedCard = $("#" + qID + "Panel").parents('.my-col');
		$.ajax({
			url: base_url + "/index.php/feedback_CA/deleteQuestion",
			type:"POST",
			data:{questionID:qID},
			success:function()
			{
				//location.reload(); // refresh pag
				$('#confirm-hide').modal('hide');
				console.log(selectedCard);
				selectedCard.hide('slow', function(){ selectedCard.remove(); });
			}
		});
	});
} );


