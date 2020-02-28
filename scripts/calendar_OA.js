let base_url=window.location.origin;
let lang=document.querySelector('#lang').value;
let current_event; // event that's been cliked

function popupSubscribe(is_subscribed, is_in_the_past) {
	console.log(is_subscribed, is_in_the_past);
	let join_event = document.getElementById('join-event');
	let dejoin_event = document.getElementById('dejoin-event');
	let past_text = document.getElementById('in-the-past');
	past_text.style.display = "none";
	if (is_in_the_past === 1) {
		past_text.style.display = "block";
		join_event.style.display = "none";
		dejoin_event.style.display = "none";
		return;
	}
	if (is_subscribed === 1) {
		join_event.style.display = "none";
		dejoin_event.style.display = "block";
	} else {
		join_event.style.display = "block";
		dejoin_event.style.display = "none";
	}
}

jQuery(document).ready(function(){
	jQuery("#join-event").click(function()
	{
		let eventID = current_event.eventID;
		let current_oa_id = document.getElementById("current_oa_id").value;
		$.ajax({
			url:base_url + "/index.php/calendar_OA/join",
			type:"POST",
			language: lang,
			data:{eventID:eventID, olderAdultID:current_oa_id},
			success:function()
			{
				$('#calendar').fullCalendar('refetchEvents');
				$('#modal-view-event').modal('hide');
			}
		})
	});
	jQuery("#dejoin-event").click(function()
	{
		let eventID = current_event.eventID;
		let current_oa_id = document.getElementById("current_oa_id").value;
		$.ajax({
			url:base_url + "/index.php/calendar_OA/dejoin",
			type:"POST",

			data:{eventID:eventID, olderAdultID:current_oa_id},
			success:function()
			{
				$('#calendar').fullCalendar('refetchEvents');
				$('#modal-view-event').modal('hide');
			}
		})
	});
});

(function () {
	'use strict';
	// ------------------------------------------------------- //
	// Calendar
	// ------------------------------------------------------ //
	let home='Startpagina';let Today='Vandaag';
	let Month='Maand';
	let Week= "Week";
	let Day= "Dag";
	let List="Lijst";
	if(lang==="en"){
		Today='Today';
		Month="Month";
		Day="Day";
		List= "List";
		home= 'Home Page';
	}
	jQuery(function() {
		// page is ready

		jQuery('#calendar').fullCalendar({
			themeSystem: 'bootstrap4',
			monthNames: ['januari','februari','maart','april','mei','juni','juli','augustus','september','oktober','november','december'],
			monthNamesShort: ['jan','feb','maart','apr','mei','juni','juli','aug','sept','oct','nov','dec'],
			dayNames: ['zondag','maandag','dinsdag','woensdag','donderdag','vrijdag','zaterdag'], // important! start with sunday
			dayNamesShort: ['zo','ma','di','wo','do','vr','za'], // important! start with sunday
			// emphasizes business hours
			businessHours: false,
			defaultView: 'month',
					// event dragging & resizing
					timeFormat: 'H:mm', // display time format on event
					// header
					customButtons: {
						home: {
							text: home,
							click: function() {
								window.location.href=base_url + '/index.php/home_OA'
							}
				}
			},
			header: {
				left:'home',
				center:'title',
				right:'prev,today,next month,agendaWeek' //listWeek
			},
			buttonText:{
				today:    Today,
				month:    Month,
				week:     Week,
				day:	  Day,
				list:     List,
			},


			eventLimit: true, // + see more
			minTime: "07:00:00",
			maxTime: "22:00:00",
			firstDay: 1, // firstday is monday
			height: 'parent',
			events:base_url + "/index.php/calendar_OA/load",
			eventRender: function(event, element) { // show info on event
				if(event.is_subscribed){
					if(event.allDay) {
						element.find(".fc-title").prepend('<i class="fas fa-walking pl-1 pb-1"></i>');
					}
					else {
						element.find(".fc-time").prepend('<i class="fas fa-walking pl-1 pb-1"></i>');
					}
				}
				let eventEnd = moment(event.end);
				let NOW = moment();
				if (eventEnd.diff(NOW, 'seconds') <= 0) {
					element.addClass("greyclass");
				}
			},
			eventClick: function(event, jsEvent, view) { // when click on event itself
				current_event = event;
				jQuery('.event-title').html(event.title); // event.start will change depending on position
				jQuery('.event-body').html(event.description);
				jQuery('.eventUrl').attr('href',event.url);
				let past_event = 0;
				let eventEnd = moment(event.end);
				let NOW = moment();
				console.log(eventEnd + " " + NOW);
				if (eventEnd.diff(NOW, 'seconds') <= 0) {
					past_event = 1;
				}

				popupSubscribe(event.is_subscribed, past_event);
				if (event.is_repeating === false)
				{
					jQuery('#modal-view-event').modal();
				}
				else
				{
					jQuery('#modal-view-event').modal();
				}

			},
		})
	});
})(jQuery);
