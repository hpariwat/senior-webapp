<?php include "language_config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<title><?php echo $lang['Title']?></title>
	<meta charset="UTF-8">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css'>µ
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/calendar_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_OA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>
<body>
<!-- JAVASCRIPT VARIABLES -->
<input type="hidden" value="<?php echo $lang['lang']?>" id='lang'>
<!-- HELP-->
<button class="help_button" onclick="StartOnboarding()">
	<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help.svg" alt="help button">
</button>

<!-- CALENDAR -->
<div class="p-4">
	<div class="row">
		<div class="card-body p-0">
			<div id='calendar-container'>
				<div id='calendar'></div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL: VIEW EVENT -->
<div id="modal-view-event" class="modal modal-top fade calendar-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title my-modal-title"><span class="event-title"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true" style="font-size: 40px!important;">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<div class="event-body my-event-body"></div>
			</div>
			<div class="modal-footer my-modal-footer-stand-alone">
				<input type="hidden" value="<?php echo $_SESSION['oa_id']?>" id="current_oa_id">
				<!--<button type="button" class="btn btn-secondary btn-close py-5" data-dismiss="modal">Close</button>-->
				<button type="submit" class="btn btn-info" id="join-event"><i class="fas fa-plus mr-2"></i><?php echo $lang['Subscribe']?></button>
				<button type="submit" class="btn btn-danger" id="dejoin-event"><i class="fas fa-minus mr-2"></i><?php echo $lang['Unsubscribe']?></button>
				<span id="in-the-past"><?php echo $lang['Event_past']?></span>
			</div>
		</div>
	</div>
</div>

<!-- LOADING ANIMATION -->
<div id="preloading-overlay">
	<div class="lds-hourglass"></div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js'></script>
<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url()?>/scripts/calendar_OA.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_calendar_OA.js"></script>
</html>







