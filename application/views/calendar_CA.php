<?php include "language_config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<title><?php echo $lang['Title']?></title>
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css'>
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/calendar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/navbar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>
<body>
<!-- JAVASCRIPT VARIABLES-->
<input type="hidden" value="<?php echo $lang['lang']?>" id="lang">
<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg sticky-top navbar-container" id="navbar">
	<a class="navbar-brand" href="<?php echo base_url();?>index.php/home_CA">
		<img src="<?php echo base_url()?>assets/img/icons/OA_Home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fas fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/statistics_CA"><?php echo $lang['Statistics']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/feedback_CA"><?php echo $lang['Feedback']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item active-link"><a class="nav-link " href="#"><?php echo $lang['Calendar']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/residents_CA"><?php echo $lang['Inhabitants']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/settings_CA"><?php echo $lang['Settings']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" id="link-logout"><?php echo $lang['Log_out']?></a><div class="underline"></div></li>
		</ul>
	</div>
</nav>
<!-- CREATE EVENT BUTTON -->
<div class="create-event-area" id="create-event-area">
	<button class="create-event-button" id="create-event-button">
		<i class="fa fa-plus fa-2x"></i>
	</button>
</div>
<!-- CALENDAR -->
<div class="loading" id="loading" style="display:none">Loading&#8230;</div>
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
				<h5 class="modal-title"><span class="event-title"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body my-modal-body-calendar">
				<div class="row event-row justify-content-between">
					<div class="col-md-6 event-space">
						<div class="participants-title">
							<i class="fas fa-book-open mr-2"></i><?php echo $lang['Description']?>
						</div>
						<div class="event-body"></div>
					</div>
					<div class="col-md-5 event-space">
						<div class="participants-title"><i class="fas fa-users mr-2"></i><?php echo $lang['Participants']?></div>
						<div class="participants-body">
							<?php echo $lang['Total:']?> <span class="event-attendants"></span>
							<div class="participants-area">
								<ul class="list-group list-group-flush" id="list-participants"></ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer my-modal-footer-stand-alone">
				<button class="btn btn-link edit-btn" id="edit-event-btn-edit-event-modal"><?php echo $lang['Edit']?></button>
				<button type="submit" class="btn btn-danger" id="delete-event-open-confirm"><i class="far fa-trash-alt my-fa mr-2"></i><?php echo $lang['Delete']?></button>
				<button class="btn btn-danger" id="btn-delete-repeating-event"><i class="far fa-trash-alt my-fa mr-2"></i><?php echo $lang['Delete']?></button>
			</div>
		</div>
	</div>
</div>
<!-- MODAL: EDIT EVENT -->
<div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-labelledby="edit-event" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-edit mr-2"></i>Edit event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<form id="change-info" method="post" action="<?php echo base_url(); ?>index.php/calendar_CA/edit_event">
					<input type="hidden" id="edit-event-id" name="eventID"/>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="edit-title-form">Event</label>
								<input maxlength="50" class="form-control"  id="edit-title-form" name="title" placeholder="Add a title">
							</div>
							<div class="form-group">
								<label for="edit-description-form">Description</label>
								<textarea maxlength="500" class="form-control" id="edit-description-form" name="description" placeholder="Add a description"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer pb-0 pr-0">
						<button type="submit" class="btn btn-add-task" id="btn-confirm-edit"><i class="fas fa-save mr-2"></i><?php echo $lang['Save']?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- MODAL: DELETE REPEATING EVENT -->
<div class="modal fade" id="modal-confirm-delete-repeatevent" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-delete-repeatevent" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-redo-alt mr-2"></i><?php echo $lang['Delete_repeating_event']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<div class="custom-control custom-radio">
					<input type="radio" id="r-delete-one" name="delete-option" class="custom-control-input" checked>
					<label class="custom-control-label" for="r-delete-one"><?php echo $lang['Only_this_event']?></label>
				</div>
				<div class="custom-control custom-radio pb-3">
					<input type="radio" id="r-delete-all" name="delete-option" class="custom-control-input">
					<label class="custom-control-label" for="r-delete-all"><?php echo $lang['All_events']?></label>
				</div>
				<div class="modal-footer pb-0 pr-0">
					<button type="submit" class="btn btn-danger" id="delete-repeating-event"><i class="far fa-trash-alt my-fa mr-2"></i><?php echo $lang['Delete']?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODAL: DELETE NORMAL EVENT -->
<div class="modal fade" id="modal-confirm-delete-event" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-delete-event" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-trash mr-2"></i><?php echo $lang['Delete']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<p><?php echo $lang["Question_delete_text"]?></p>
				<div class="modal-footer pb-0 pr-0">
					<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal"><i class="fas fa-times mr-2"></i><?php echo $lang["No"]?></button>
					<button type="submit" class="btn btn-add-task" id="delete-event"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODAL: ADD EVENT -->
<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-calendar-plus mr-2"></i><?php echo $lang['Add_ev']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="add-event">
				<div class="modal-body my-modal-body">
					<div class="form-group">
						<input autocomplete="off" type="text" maxlength="50" class="form-control" name="ename" id="ename" placeholder="<?php echo $lang['Add_title']?>">
					</div>
					<div class="row">
						<div class="col-2">
							<div class="datelabel"><?php echo $lang['Start']?></div>
						</div>
						<div class="col-5">
							<input type="date" class="form-control date-form my-1 mr-2" id="estartdate" name="estartdate" value="<?php echo date('Y-m-d');?>">
						</div>
						<div class="col-5">
							<input type="time" class="form-control date-form my-1" id="estarttime" name="estarttime" value="<?php echo date('H:00'); ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<div class="datelabel"><?php echo $lang['End']?></div>
						</div>
						<div class="col-5">
							<input type="date" class="form-control date-form my-1 mr-2" id="eenddate" name="eenddate" value="<?php echo date('Y-m-d'); ?>">
						</div>
						<div class="col-5">
							<input type="time" class="form-control date-form my-1" id="eendtime" name="eendtime" value="<?php echo date('H:00', strtotime('+1 hour')); ?>">
						</div>
					</div>
					<br>
					<div class="form-group">
						<textarea autocomplete="off" maxlength="500" class="form-control" name="edesc" placeholder="<?php echo $lang['add_des']?>"></textarea>
					</div>
					<div class="form-inline">
						<div class="custom-control custom-checkbox my-1 mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="allday" name="eallday">
							<label class="custom-control-label" for="allday"><?php echo $lang['All_day']?></label>
						</div>
						<div class="custom-control custom-checkbox my-1 mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="repeat" name="erepeat" onclick="popupRepeat('repeat', 'repeat-area')">
							<label class="custom-control-label" for="repeat"><?php echo $lang['Repeat']?></label>
						</div>
					</div>
					<div class="repeat-area" id="repeat-area">
						<div class="form-inline">
							<label class="my-1 mr-2" for="amount"><?php echo $lang['Repeat_ev']?></label>
							<input class="form-control" type="number" id="amount" min="1" max="30" name="eamount" value="1">

							<select class="custom-select my-1 mr-sm-2" name="etype" id="DOW-selector" onchange="popupDOW('DOW-selector', 'DOW-area')">
								<option value="day"><?php echo $lang['Day']?></option>
								<option value="week" selected><?php echo $lang['Week']?></option>
								<option value="month"><?php echo $lang['Month']?></option>
								<option value="year"><?php echo $lang['Year']?></option>
							</select>
						</div>
						<div class="form-group" id="DOW-area">
							<label><?php echo $lang['Repeat_on']?></label>
							<br>
							<div class="btn-group" role="group">
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="mon" name="emon">
									<label class="custom-control-label" for="mon"><?php echo $lang['Mon']?></label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="tue" name="etue">
									<label class="custom-control-label" for="tue"><?php echo $lang['Tue']?></label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="wed" name="ewed">
									<label class="custom-control-label" for="wed"><?php echo $lang['Wed']?></label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="thu" name="ethu">
									<label class="custom-control-label" for="thu"><?php echo $lang['Thu']?></label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="fri" name="efri">
									<label class="custom-control-label" for="fri"><?php echo $lang['Fri']?></label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="sat" name="esat">
									<label class="custom-control-label" for="sat"><?php echo $lang['Sat']?></label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline">
									<input type="checkbox" class="custom-control-input" id="sun" name="esun">
									<label class="custom-control-label" for="sun"><?php echo $lang['Sun']?></label>
								</div>
							</div>
						</div>
						<?php echo $lang['End']?>
						<div class="custom-control custom-radio">
							<input type="radio" value="neverend" id="customRadio1" name="eendtype" class="custom-control-input" checked>
							<label class="custom-control-label" for="customRadio1"><?php echo $lang['Never']?></label>
						</div>
						<div class="custom-control custom-radio">
							<div class="form-inline">
								<input type="radio" value="endon" id="customRadio2" name="eendtype" class="custom-control-input">
								<label class="custom-control-label my-1 mr-2" for="customRadio2"><?php echo $lang['On']?></label>
								<input class="form-control" type="date" id="eendrepeat" name="eendrepeat" value="<?php echo date('Y-m-d', strtotime('+2 months')); ?>">
							</div>
						</div>
						<div class="custom-control custom-radio">
							<div class="form-inline">
								<input type="radio" value="endafter" id="customRadio3" name="eendtype" class="custom-control-input">
								<label class="custom-control-label my-1 mr-2" for="customRadio3"><?php echo $lang['After']?></label>
								<input class="form-control my-1 mr-2" type="number" id="amount" min="1" max="500" name="eoccurrence" value="10">
								<label for="amount"><?php echo $lang['Occurrences']?></label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer my-modal-footer-stand-alone">
					<button type="submit" class="btn btn-info" id="btn-add-event"><i class="fas fa-plus mr-2"></i><?php echo $lang['Add']?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- MODAL: LOGOUT -->
<div class="modal fade" id="modal-logout-confirm" tabindex="-1" role="dialog" aria-labelledby="logout-confirm" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-sign-out-alt mr-2"></i><?php echo $lang['Log_out']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<p><?php echo $lang["Log_out_delete_text"]?></p>
				<div class="modal-footer pb-0 pr-0">
					<form id="btn-logout-confirm" method="post" action="<?php echo base_url(); ?>index.php/home_CA/logout">
						<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal"><i class="fas fa-times mr-2"></i><?php echo $lang["No"]?></button>
						<button type="submit" class="btn btn-add-task" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
					</form>
				</div>
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js'></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url()?>/scripts/calendar_CA.js"></script>
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
</html>
