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
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/navbar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/settings_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-container">
	<a class="navbar-brand" href="<?php echo base_url()?>index.php/home_CA">
		<img src="<?php echo base_url()?>assets/img/icons/OA_Home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fas fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<ul class="navbar-nav ml-auto" >
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/statistics_CA"><?php echo $lang['Statistics']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/feedback_CA"><?php echo $lang['Feedback']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link " href="<?php echo base_url()?>index.php/calendar_CA"><?php echo $lang['Calendar']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/residents_CA"><?php echo $lang['Inhabitants']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item active-link"><a class="nav-link" href="#"><?php echo $lang['Settings']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" id="link-logout"><?php echo $lang['Log_out']?></a><div class="underline"></div></li>
		</ul>
	</div>
</nav>

<div class="modal fade" id="edit-info" tabindex="-1" role="dialog" aria-labelledby="edit-info" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit mr-2"></i><?php echo $lang['Edit_personal']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<form id="change-info" method="post" action="<?php echo base_url(); ?>index.php/settings_CA/validation">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="first_name"><?php echo $lang['First_name']?></label>
								<input type="text" class="form-control" id="first_name" name="c_first_name" value="<?php echo $_SESSION['ca_first_name']?>" oninvalid="this.setCustomValidity('Enter First Name')" oninput="setCustomValidity('')" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="last_name"><?php echo $lang['Last_name']?></label>
								<input type="text" class="form-control" id="last_name" name="c_last_name" value="<?php echo $_SESSION['ca_last_name']?>" oninvalid="this.setCustomValidity('Enter Last Name')" oninput="setCustomValidity('')" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for ="function"><?php echo $lang['Function']?></label>
								<select class="form-control" id="function" name="c_function" oninvalid="this.setCustomValidity('Enter Language')" oninput="setCustomValidity('')" required>
									<option><?php echo $lang['Caregiver']?></option>
									<option><?php echo $lang['Entertainer']?></option>
									<option><?php echo $lang['Volunteer']?></option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="user_id"><?php echo $lang['User_id']?></label>
								<input type="text" class="form-control" id="user_id" name="c_user_id" value="<?php echo $_SESSION['ca_id']?>" oninvalid="this.setCustomValidity('Enter Last Name')" oninput="setCustomValidity('')" required readonly>
							</div>
						</div>
						<div class="col-sm-6">
							<a href="<?php echo base_url(); ?>index.php/Change_email_CA/index">
							<input type="button" class="btn btn-secondary w-100 mb-4 mt-2" value="<?php echo $lang['change_mail']?>"/>
							</a>
						</div>
						<div class="col-sm-6 w-100">
							<a href="<?php echo base_url(); ?>index.php/Reset_request/index">
							<input type="button" class="btn btn-secondary w-100 mb-4 mt-2" value="<?php echo $lang['change_pw']?>"/>
							</a>
						</div>
					</div>
					<div class="modal-footer pb-0 pr-0">
						<button type="submit" class="btn btn-save"><i class="fas fa-save mr-2"></i><?php echo $lang['save']?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow mt-5">
				<div class="card-header card-header-quicklook" >
					<span class="left"><?php echo $lang['Acount_info']?></span>
					<span class="right">
						<a class="btn p-0" href="#edit-info" data-toggle="modal" data-target="#edit-info">
							<i class="fas fa-edit"></i>
						</a>
					</span>
				</div>
				<div class="card-body">
					<p><b><?php echo $lang['First_name:']?></b> <?php echo $_SESSION['ca_first_name']?></p>
					<p><b><?php echo $lang['Last_name:']?></b> <?php echo $_SESSION['ca_last_name']?></p>
					<p><b><?php echo $lang['E-mail:']?></b> <?php echo $_SESSION['ca_email']?></p>
					<p><b><?php echo $lang['Function:']?></b> <?php echo $_SESSION['ca_function']?></p>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow mt-5">
				<div class="card-header card-header-quicklook">Helpdesk</div>
				<div class="card-body">
					<p><?php echo $lang['Text_Setting']?></p>
					<p><b><?php echo $lang['E-mail:']?></b> a19ux1@gmail.com</p>
					<p><b><?php echo $lang['Phone:']?></b> +32 490 81 37 07</p>
				</div>
				<div class="card-footer">
					<div class="row d-flex">
						<div class="col-6 text-left">
							<a href="mailto:a19ux1@gmail.be?subject=Request%20Support%20(User%20ID%3A%20<?php echo $_SESSION['ca_id']?>)&amp;body=Hallo%20Team%201!" class="btn btn-settings"><i class="fa fa-envelope mr-2"></i>E-mail sturen</a>
						</div>
						<div class="col-6 text-right">
							<a href="tel:049-081-3707" class="btn btn-settings"><i class="fa fa-phone mr-2"></i><?php echo $lang['Call_Helpdesk']?></a>
						</div>
					</div>
				</div>
			</div>
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
						<button type="submit" class="btn btn-save" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
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
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
</html>
