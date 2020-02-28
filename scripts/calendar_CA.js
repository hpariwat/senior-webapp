let base_url = window.location.origin;
let lang = document.querySelector('#lang').value;
let current_event; // event that's been cliked

$('#estartdate').change(function() {
	let startDate = $(this).val();
	let endDate = document.getElementById('eenddate').value;
	if (moment(startDate).diff(moment(endDate), 'seconds') >= 0) {
		document.getElementById('eenddate').value = startDate;
	}
	checkDayOfWeek(moment(startDate));
});

$('#eenddate').change(function() {
	let endDate = $(this).val();
	let startDate = document.getElementById('estartdate').value;
	if (moment(endDate).diff(moment(startDate), 'seconds') <= 0) {
		document.getElementById('estartdate').value = endDate;
		checkDayOfWeek(moment(endDate));
	}
});

$('#delete-event-open-confirm').click(function(){
	$('.modal-backdrop').removeClass("modal-backdrop");
	$('#modal-view-event').modal('hide');
	$('#modal-confirm-delete-event').modal('show');
});

$('#edit-event-btn-edit-event-modal').click( function()
{
	document.getElementById('edit-event-id').value = current_event.eventID;
	document.getElementById('edit-title-form').value = current_event.title;
	document.getElementById('edit-description-form').value = current_event.description;
	$('.modal-backdrop').removeClass("modal-backdrop");
	$('#modal-view-event').modal('hide');
	$('#edit-event').modal('show');
});

$('#btn-delete-repeating-event').click( function()
{
	$('.modal-backdrop').removeClass("modal-backdrop");
	$('#modal-view-event').modal('hide');
	$('#modal-confirm-delete-repeatevent').modal('show');
});

$(document).ready(function(){

	$('#create-event-button').click(function(){
		$('#modal-view-event-add').modal();
	});

	$("#add-event").submit(function(){
		let values = {};
		$.each($('#add-event').serializeArray(), function(i, field) {
			values[field.name] = field.value;
			console.log(field.name + " > " + field.value);
		});

		let isAllday = 0;
		if (values.eallday === "on") isAllday = 1;
		let isRepeating = 0;
		if (values.erepeat === "on") isRepeating = 1;

		let repeatOn = [];
		if (values.esun === "on") repeatOn.push("sunday");
		if (values.emon === "on") repeatOn.push("monday");
		if (values.etue === "on") repeatOn.push("tuesday");
		if (values.ewed === "on") repeatOn.push("wednesday");
		if (values.ethu === "on") repeatOn.push("thursday");
		if (values.efri === "on") repeatOn.push("friday");
		if (values.esat === "on") repeatOn.push("saturday");

		$.ajax({
			url:base_url + "/index.php/calendar_CA/insert", // send request to insert method
			type:"POST", // send data to server
			data:{title:values.ename, description:values.edesc,
				start_date:values.estartdate, end_date:values.eenddate,
				start_time:values.estarttime, end_time:values.eendtime,
				all_day:isAllday,
				is_repeating:isRepeating,
				repeat_interval:values.eamount,
				repeat_type:values.etype,
				repeat_on:repeatOn,
				repeat_mode:values.eendtype,
				repeat_end_date:values.eendrepeat,
				repeat_occurrence:values.eoccurrence}, // define which data we send to server
			success:function() // callback function if the request has completed successfuly
			{
				$('#calendar').fullCalendar('refetchEvents'); // reload event data on calendar
			}
		})
	});

	$("#delete-event").click(function()
	{
		let eventID = current_event.eventID;
		$.ajax({
			url:base_url + "/index.php/calendar_CA/delete",
			type:"POST",
			data:{eventID:eventID},
			success:function()
			{
				$('#calendar').fullCalendar('refetchEvents');
				$('#modal-confirm-delete-event').modal('hide');
			}
		})
	});

	$("#delete-repeating-event").click(function()
	{
		let deleteOne = document.getElementById('r-delete-one').checked;
		let deleteAll = document.getElementById('r-delete-all').checked;

		if (deleteOne === true) {
			let eventID = current_event.eventID;
			$.ajax({
				url: base_url + "/index.php/calendar_CA/delete",
				type:"POST",
				data:{eventID:eventID},
				success:function()
				{
					$('#calendar').fullCalendar('refetchEvents');
					$('#modal-confirm-delete-repeatevent').modal('hide');
				}
			})
		}
		else if (deleteAll === true) {
			let group_ID = current_event.group_ID;
			$.ajax({
				url: base_url + "/index.php/calendar_CA/delete_repeat",
				type:"POST",
				data:{group_ID:group_ID},
				success:function()
				{
					$('#calendar').fullCalendar('refetchEvents');
					$('#modal-confirm-delete-repeatevent').modal('hide');
				}
			});
		}
	});

	// calendar
	let Today='Vandaag';
	let Month='Maand';
	let Week= "Week";
	let Day= "Dag";
	let List="Lijst";
	if(lang==="en"){
		Today='Today';
		Month="Month";
		Day="Day";
		List= "List"
	}
	let months = ['januari','februari','maart','april','mei','juni','juli','augustus','september','oktober','november','december'];
	let monthsabbr = ['jan','feb','maart','apr','mei','juni','juli','aug','sept','oct','nov','dec'];
	let days = ['zondag','maandag','dinsdag','woensdag','donderdag','vrijdag','zaterdag'];
	let daysabbr = ['zo','ma','di','wo','do','vr','za'];
	if (lang === "en")
	{
		months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
		monthsabbr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
		days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
		daysabbr = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
	}

	$('#calendar').fullCalendar({
		themeSystem: 'bootstrap4',
		monthNames: months,
		monthNamesShort: monthsabbr,
		dayNames: days, // important! start with sunday
		dayNamesShort: daysabbr, // important! start with sunday
		businessHours: false, // emphasizes business hours
		defaultView: 'month',
		editable: true, // event dragging & resizing
		timeFormat: 'H:mm', // display time format on event
		header: {
			left:'prev,today,next',
			center:'title',
			right:'month,agendaWeek' //listWeek
		},
		buttonText:{
			today:    Today,
			month:    Month,
			week:     Week,
			day:	  Day,
			list:     List
		},
		eventLimit: true, // + see more
		minTime: "07:00:00",
		maxTime: "22:00:00",
		firstDay: 1,
		height: 'parent',
		events:base_url + "/index.php/calendar_CA/load",
		eventRender: function(event, element) { // show info on event
			let eventEnd = moment(event.end);
			let NOW = moment();
			if (eventEnd.diff(NOW, 'seconds') <= 0) element.addClass("greyclass");
		},
		dayClick: function(date)  { // when click on cell
			document.getElementById('estartdate').value = date.format('YYYY-MM-DD');
			document.getElementById('eenddate').value = date.format('YYYY-MM-DD');
			checkDayOfWeek(date);
			$('#modal-view-event-add').modal();
		},
		eventResize:function(event) // exec func when we resize (scale event)
		{
			updateEvent(event);
		},
		eventDrop:function(event) // call when drag and drop event
		{
			updateEvent(event);
		},
		eventClick: function(event, jsEvent, view) { // when click on event itself
			current_event = event;
			$('.event-title').html(event.title); // event.start will change depending on position
			$('.event-attendants').html(event.attendants);
			$('.event-body').html(event.description);
			$('.eventUrl').attr('href',event.url);
			$.ajax({
				url:base_url + "/index.php/calendar_CA/show_participants",
				type:"POST",
				data:{eventID:event.eventID},
				success:function(response)
				{
					showParticipants(response);
				}
			});
			popupRepeatEventButtons(event.is_repeating);
			$('#modal-view-event').modal();
		},
	})
});

function updateEvent(event) {
	let eventID = event.eventID;
	let start_date = event.start.format('YYYY-MM-DD');
	let end_date = event.start.format('YYYY-MM-DD');
	let start_time;
	let end_time;
	let all_day;
	if (event.allDay === false)
	{
		start_time = event.start.format('HH:mm:ss');
		end_time = event.end.format('HH:mm:ss');
		all_day = 0;
	}
	else
	{
		start_time = undefined;
		end_time = undefined;
		all_day = 1;
	}
	console.log(start_date + " " + end_date + " " + start_time + " " + end_time + " " + event.allDay);
	$.ajax({
		url:base_url + "/index.php/calendar_CA/update",
		type:"POST",
		data:{
			start_date: start_date,
			end_date: end_date,
			start_time: start_time,
			end_time: end_time,
			eventID:eventID,
			all_day: all_day},
		success:function()
		{
			$('#calendar').fullCalendar('refetchEvents');
		}
	});
}

function showParticipants(response) {
	console.log(response);
	if (response === '') { // if no participants, remove all li in ul
		let ul = document.querySelector("#list-participants");
		let lis;
		while( (lis = ul.getElementsByTagName("li")).length > 0) {
			ul.removeChild(lis[0]); // remove all li before adding li
		}
		return;
	}
	response = response.replace(/}{/g, "}JZP{"); //"}{", // REPLACE ALL OCCURENCESS IN STRING
	console.log(response);
	let people = response.split("JZP");
	console.log(people);
	let ul = document.querySelector("#list-participants");
	let lis;
	while( (lis = ul.getElementsByTagName("li")).length > 0) {
		ul.removeChild(lis[0]); // remove all li before adding li
	}

	for (let person of people) {
		let objJSON = JSON.parse(person);

		let listItem = document.createElement("li");
		listItem.className = "list-group-item";
		listItem.textContent = objJSON.first_name + " " + objJSON.last_name;
		//console.log(ul);
		ul.appendChild(listItem);
	}
}

function getDayOfWeek(date) {
	let dayOfWeek = new Date(date).getDay();
	return isNaN(dayOfWeek) ? null : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][dayOfWeek];
}

function checkDayOfWeek(date) {
	resetDayOfWeek();
	let dow = getDayOfWeek(date.format('YYYY-MM-DD'));
	if (dow === 'Sunday') document.getElementById('sun').checked = true;
	else if (dow === 'Monday') document.getElementById('mon').checked = true;
	else if (dow === 'Tuesday') document.getElementById('tue').checked = true;
	else if (dow === 'Wednesday') document.getElementById('wed').checked = true;
	else if (dow === 'Thursday') document.getElementById('thu').checked = true;
	else if (dow === 'Friday') document.getElementById('fri').checked = true;
	else if (dow === 'Saturday') document.getElementById('sat').checked = true;
}

function resetDayOfWeek()
{
	document.getElementById('sun').checked = false;
	document.getElementById('mon').checked = false;
	document.getElementById('tue').checked = false;
	document.getElementById('wed').checked = false;
	document.getElementById('thu').checked = false;
	document.getElementById('fri').checked = false;
	document.getElementById('sat').checked = false;
}

function popupRepeatEventButtons(is_repeating) {
	const delete_event= document.getElementById('delete-event-open-confirm');
	const delete_repeating_event = document.getElementById('btn-delete-repeating-event');
	if (is_repeating === '1') {
		delete_event.style.display = "none";
		delete_repeating_event.style.display = "block";
	} else {
		delete_event.style.display = "block";
		delete_repeating_event.style.display = "none";
	}
}
function popupRepeat(btnID, textID) {
	let checkBox = document.getElementById(btnID);
	let text = document.getElementById(textID);
	if (checkBox.checked === true){
		text.style.display = "block";
	} else {
		text.style.display = "none";
	}
}

function popupDOW(btnID, textID) {
	let selectorBox = document.getElementById(btnID);
	let text = document.getElementById(textID);
	if (selectorBox.value === 'week') {
		text.style.display = "block";
	} else {
		text.style.display = "none";
	}
}
