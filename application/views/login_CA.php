<?php
include "language_config.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Reuired meta tags -->
	<title><?php echo $lang['CA_title']?></title>
	<meta charset="UTF-8">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="a demo site">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_CA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/buttons_cards.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid" id="turn">
	<div class="row no-gutter">
		<!-- The image half -->
		<div class="col-md-6 col-lg-8 d-md-flex bg-image"></div>

		<!-- The content half -->
		<div class="col-md-6 col-lg-4 bg-light">
			<div class="login d-flex align-items-center py-5">

				<!-- Demo content-->
				<div class="container">
					<div class="row">
						<?php
						if($this->session->flashdata('message'))
						{
							echo '
							<div class="alert alert-danger w-100">
								' . $this->session->flashdata("message") . '
							</div>
							';
						}
						?>

						<h3><?php echo $lang['CA_header']?></h3>
						<form class="form-signin" method="post" action="<?php echo base_url(); ?>index.php/login_CA/validation">
							<div class="form-label-group">
								<input type="email" id="user_email" name="user_email" class="form-control"
									   placeholder="E-mailadres"
									   oninvalid="this.setCustomValidity('<?php echo $lang['CA_email_label']?>')"
									   oninput="setCustomValidity('')"
									   value="<?php echo set_value('user_email'); ?>"
									   required autofocus/>
								<label for="user_email"><?php echo $lang['CA_email_label']?></label>
								<span class="text-danger"><?php echo form_error('user_email'); ?></span>
							</div>
							<div class="form-label-group">
								<input type="password" id="user_password" name="user_password" class="form-control"
									   placeholder="Wachtwoord"
									   oninvalid="this.setCustomValidity('<?php echo $lang['CA_password_label']?>')"
									   oninput="setCustomValidity('')"
									   value="<?php echo set_value('user_password'); ?>"
									   required/>
								<label for="user_password"><?php echo $lang['CA_password_label']?></label>
								<span class="text-danger"><?php echo form_error('user_password'); ?></span>
							</div>

							<!-- Password recovery -->
							<button type="submit" class="btn btn-lg btn-success btn-block text-uppercase" id="button_login" name="login" value="Login"><?php echo $lang['CA_signinbutton']?></button>
							<div class="forgot-password text-center mt-2">
								<a href="<?php echo base_url(); ?>index.php/Reset_request/index"><?php echo $lang['CA_Forgot_password']?></a>
							</div>
						</form>
					</div>

					<hr>

					<div class="row no gutter">
						<a class="form-signin nounderline" href="<?php echo base_url(); ?>index.php/register_CA/index">
							<button type="submit" class="btn knop btn-lg btn-primary btn-block text-uppercase" id="button_register">
								<?php echo $lang['CA_register_button']?>
							</button>
						</a>
					</div>

					<div class="row justify-content-center pt-5">
						<a href="<?php echo base_url(); ?>index.php/landing/index">
							<button class="btn btnLogin">
								<span><?php echo $lang['backLanding']?></span>
							</button>
						</a>
					</div>
				</div>
			</div>
			<!-- End -->
		</div>
	</div>
	<!-- End -->
</div>

<div id="preloading-overlay">
	<div class="lds-hourglass"></div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>
</html>
