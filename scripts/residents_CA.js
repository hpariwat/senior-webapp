let lang=document.querySelector('#lang').value;

$(document).ready( function () {
	let table =  $('#myTable').DataTable({
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

	});

	$('#searchInput').on( 'keyup', function () {
		table.search( this.value ).draw();
	} );

	$('#myTable tbody').on('click', 'td.details-control', function () {
		let tr = $(this).closest('tr');
	} );

	$('#datepicker').datepicker({
		uiLibrary: 'bootstrap4'
	});


	/* FOR DROPDOWN DATE PICKER */
	let monthNames;
	console.log(lang);
	if (lang === 'en') {
		monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	}
	else {
		monthNames = ['Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December'];
	}

	let qntYears = 100;
	let selectYear = $("#year");
	let selectMonth = $("#month");
	let selectDay = $("#day");
	let currentYear = new Date().getFullYear();

	for (let y = 0; y < qntYears; y++){
		let yearElem = document.createElement("option");
		yearElem.value = currentYear;
		yearElem.textContent = currentYear;
		selectYear.append(yearElem);
		currentYear--;
	}

	for (let m = 0; m < 12; m++){
		let monthNum = new Date(2018, m).getMonth();
		let month = monthNames[monthNum];
		let monthElem = document.createElement("option");
		monthElem.value = monthNum;
		monthElem.textContent = month;
		selectMonth.append(monthElem);
	}

	let d = new Date();
	let month = d.getMonth();
	let year = d.getFullYear();
	let day = d.getDate();

	selectYear.val(year);
	selectYear.on("change", AdjustDays);
	selectMonth.val(month);
	selectMonth.on("change", AdjustDays);

	AdjustDays();
	selectDay.val(day);

	function AdjustDays(){
		let year = selectYear.val();
		let month = parseInt(selectMonth.val()) + 1;
		selectDay.empty();

		//get the last day, so the number of days in that month
		let days = new Date(year, month, 0).getDate();

		//lets create the days of that month
		for (let d = 1; d <= days; d++){
			let dayElem = document.createElement("option");
			dayElem.value = d;
			dayElem.textContent = d;
			selectDay.append(dayElem);
		}
	}
} );
