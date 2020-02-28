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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_OA.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>
<!-- View containing background image (blurred)-->
<div class="view">
	<button class="pr-sm-5 help_button" onclick="StartOnboarding()">
		<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help.svg" alt="help button">
	</button>
	<div class="container">
		<div class="row">
			<!-- Card with input fields and login button -->
			<div class="col-12 mx-auto">
				<div class="card mx-auto m-5">
					<div class="card-body">
						<?php
						if($this->session->flashdata('message'))
						{
							echo '
								<div class="alert alert-danger">
									'.$this->session->flashdata("message").'
								</div>
							';
						}
						 ?>
						<form class="w-100 " method="post" action="<?php echo base_url(); ?>index.php/login_OA/validation">
							<div class="form-label-group mt-3 mb-4 roomnumber_field">
								<input type="number" id="user_room_number" name="user_room_number" class="form-control" placeholder="Room Number"
									   oninvalid="this.setCustomValidity('Enter A Room Number')"
									   oninput="setCustomValidity('')" required autofocus>
								<label for="user_room_number"><?php echo $lang['Ask_Room']?></label>
								<!--<span class="text-danger"><?php echo form_error('user_room_number'); ?></span>-->
							</div>
							<div class="form-label-group mb-3 pincode_field">
								<input type="number" id="user_pincode" name="user_pincode" class="form-control" placeholder="Pincode"
									   oninvalid="this.setCustomValidity('Enter A Pincode. It should only contain numbers.')"
									   oninput="setCustomValidity('')" required>
								<label for="user_pincode"><?php echo $lang['Ask_Pin']?></label>
								<!--<span class="text-danger"><?php echo form_error('user_pincode'); ?></span>-->
							</div>
							<button class="btn btn-lg btn-block btnLogin text-uppercase" type="submit"><?php echo $lang['Login']?></button>
						</form>
						<hr class="my-4">
						<div class="row justify-content-end pr-3">
							<a href="<?php echo base_url(); ?>index.php/landing/index">
								<button class="btn btnLogin btn-brown">
									<span><?php echo $lang['backLanding']?></span>
								</button>
							</a>
						</div>
					</div>
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

<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_login_OA.js"></script>
</html>
