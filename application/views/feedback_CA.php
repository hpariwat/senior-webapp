<?php include "language_config.php" ?>
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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/navbar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/feedback_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/my_modal.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>
<body>
<input type="hidden" value="<?php echo $_SESSION['lang']?>" id='lang'>

<!-- NAVIGATION BAR-->
<nav class="navbar navbar-expand-lg sticky-top navbar-container">
	<a class="navbar-brand" href="home_CA">
		<img src="<?php echo base_url()?>assets/img/icons/OA_Home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fas fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<ul class="navbar-nav ml-auto" >
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/statistics_CA"><?php echo $lang['Statistics']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item active-link"><a class="nav-link" href="<?php echo base_url();?>index.php/feedback_CA"><?php echo $lang['Feedback']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link " href="<?php echo base_url();?>index.php/calendar_CA"><?php echo $lang['Calendar']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/residents_CA"><?php echo $lang['Inhabitants']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/settings_CA"><?php echo $lang['Settings']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" id="link-logout"><?php echo $lang['Log_out']?></a><div class="underline"></div></li>
		</ul>
	</div>
</nav>

<div class="container p-4">
	<input class="form-control col-1" type="hidden" id="numPanels" value="11" maxlength="3" />
	<div class="row" id="contentPanel">
		<!-- QUESTIONS -->
	</div>
</div>

<!-- QUESTION -->
<div class="modal fade" id="add-question" tabindex="-1" role="dialog" aria-labelledby="add-question" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-question mr-2"></i><?php echo $lang['Question_add']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<form id="change-info" method="post" action="<?php echo base_url(); ?>index.php/feedback_CA/addQuestion">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="topic"><?php echo $lang['Topic']?></label>
								<input maxlength="1000" class="form-control"  id="topic" name="topic" placeholder="<?php echo $lang['Add_topic']?>" oninvalid="this.setCustomValidity('Enter Topic')" oninput="setCustomValidity('')" required>
							</div>
							<div class="form-group">
								<label for="name"><?php echo $lang['Question']?></label>
								<input maxlength="1000" class="form-control" id="question" name="question" placeholder="<?php echo $lang['Add_question']?>" oninvalid="this.setCustomValidity('Enter Question')" oninput="setCustomValidity('')" required>
							</div>
						</div>
					</div>
					<div class="modal-footer pb-0 pr-0">
						<button type="submit" class="btn btn-add-task"><i class="fas fa-plus mr-2"></i><?php echo $lang['Add']?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- MODAL: CONFIRM DELETE -->
<div class="modal fade" id="confirm-hide" tabindex="-1" role="dialog" aria-labelledby="confirm-hide" aria-hidden="true" >
	<div class="modal-dialog" role="document">
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
					<button type="submit" class="btn btn-add-task" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL: EDIT QUESTION -->
<div class="modal fade" id="edit-question" tabindex="-1" role="dialog" aria-labelledby="edit-question" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-edit mr-2"></i><?php echo $lang["Edit_question"]?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<form id="change-info" method="post" action="<?php echo base_url(); ?>index.php/feedback_CA/editQuestion">
					<input type="hidden" id="edit-id-form" name="questionID"/>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="edit-topic"><?php echo $lang['Topic']?></label>
								<input class="form-control"  id="edit-topic" name="topic" placeholder="<?php echo $lang['Add_topic']?>"
									   oninvalid="this.setCustomValidity('Enter Topic')" oninput="setCustomValidity('')" required
									   maxlength="1000">
							</div>
							<div class="form-group">
								<label for="edit-question-form"><?php echo $lang['Question']?></label>
								<input class="form-control" id="edit-question-form" name="question" placeholder="<?php echo $lang['Add_question']?>"
									   oninvalid="this.setCustomValidity('Enter Question')" oninput="setCustomValidity('')" required
									   maxlength="1000">
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
<script src="<?php echo base_url() ?>/scripts/feedback_CA.js"></script>
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
</html>
