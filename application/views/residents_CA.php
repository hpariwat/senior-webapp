<?php
include "language_config.php"
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<title><?php echo $lang['Title']?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
		  integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/navbar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/residents_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>
<input type="hidden" value="<?php echo $lang['lang']?>" id="lang">
<nav class="navbar navbar-expand-lg sticky-top navbar-container">
	<a class="navbar-brand" href="<?php echo base_url() ?>index.php/home_CA">
		<img src="<?php echo base_url() ?>/assets/img/icons/OA_Home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fas fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<ul class="navbar-nav ml-auto" >
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/statistics_CA"><?php echo $lang['Statistics']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/feedback_CA"><?php echo $lang['Feedback']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link " href="<?php echo base_url() ?>index.php/calendar_CA"><?php echo $lang['Calendar']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item active-link"><a class="nav-link" href="#"><?php echo $lang['Inhabitants']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>index.php/settings_CA"><?php echo $lang['Settings']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" id="link-logout"><?php echo $lang['Log_out']?></a><div class="underline"></div></li>
		</ul>
	</div>
</nav>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['New_res']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<form id="add-event" method="post" action="<?php echo base_url(); ?>index.php/residents_CA/validation">

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="first_name"><?php echo $lang['First_name']?></label>
								<input type="text" maxlength="30" class="form-control" id="first_name" name="r_first_name" oninvalid="this.setCustomValidity('Enter First Name')" oninput="setCustomValidity('')" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="last_name"><?php echo $lang['Last_name']?></label>
								<input type="text" maxlength="30" class="form-control" id="last_name" name="r_last_name" oninvalid="this.setCustomValidity('Enter Last Name')" oninput="setCustomValidity('')" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for ="language" class="mb-2"><?php echo $lang['Language']?></label>
								<select class="form-control" id="language" name="r_language" oninvalid="this.setCustomValidity('Enter Language')" oninput="setCustomValidity('')" required>
									<option>Nederlands</option>
									<option>Français</option>
									<option>English</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="room_number" class="mb-2"><?php echo $lang['Room_number']?></label>
								<input type="number" class="form-control" id="room_number" name="r_room_number" oninvalid="this.setCustomValidity('Enter Room Number')" oninput="setCustomValidity('')" required>
							</div>
						</div>
					</div>
					<div class="row pb-3">
						<div class="col-sm-12">
							<label for="year" class="mb-2"><?php echo $lang['Birthdate']?></label>
							<div class="form-inline justify-content-between">
								<select class="form-control px-4" id="year" name="r_year" required></select>
								<select class="form-control px-5" id="month" name="r_month" required></select>
								<select class="form-control px-4" id="day" name="r_day" required></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="pin"><?php echo $lang['Code']?></label>
								<div class="input-group">
									<input type="password" pattern="[0-9]*" maxlength="6" class="form-control" id="pin"
										   name="r_pin" oninvalid="this.setCustomValidity('Enter PIN. Only numbers are accepted.')"
										   oninput="setCustomValidity('')" required
										   data-toggle="password">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fa fa-eye-slash"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer my-modal-footer">
						<button type="submit" class="btn btn-add" ><i class="fas fa-plus mr-2"></i><?php echo $lang['Add']?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<?php
	$var = $this->session->flashdata('message');
	if(!is_null($var))
	{
		echo '
		<div class="alert alert-success alert-dismissible text-center fade show success-box mt-3 mb-1" style="border-radius: 16px!important;" role="alert">
			<h3>' . $var . '</h3>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
	';
	}
	?>
	<div class="card mt-3">
		<div class="card-header">
			<span style="float: left"><?php echo $lang['Inhabitants']?></span>
			<span style="float: right">
				<div class="row">
					<div class="col text-right">
						<input class="form-control search-box" type="text" placeholder="<?php echo $lang['SearchResident']?>" id="searchInput">
					</div>
					<div class="col text-right pl-1 pr-1">
						<i class="fas fa-search"></i>
					</div>
					<div class="col text-right">
						<a class="btn p-0" href="modal-add" data-toggle="modal" data-target="#modal-add">
						<i class="fas fa-user-plus"></i>
					</a>
					</div>
				</div>
			</span>
		</div>
		<div class="card-body pt-1">
			<?php echo $table ?>
		</div>
	</div>
</div>

<!-- LOGOUT MODAL HEADER -->
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
						<button type="submit" class="btn btn-add" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/scripts/residents_CA.js"></script>
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
<script src="<?php echo base_url() ?>/scripts/show_password.js"></script>
</html>
