<?php
include "language_config.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset_password.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">

	<!-- Font Icons -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div class="view">
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
						<div class="alert alert-success">
							' . $this->session->flashdata("message") . '
						</div>
						';
						}
						?>
						<form method="post" action="<?php echo base_url(); ?>index.php/reset_request/forgot_password">
							<h2 class="card-title"><?php echo $lang['PW-title']?></h2>
							<p class="card-text"><?php echo $lang['PW-message']?></p>
							<div class="form-group">
								<input type="email" name="user_email" class="form-control"
									   placeholder="<?php echo $lang['PW-placeholder']?>" value="<?php echo set_value('user_email'); ?>"
									   oninvalid="this.setCustomValidity('<?php echo $lang['CA_email_label']?>')"
									   oninput="setCustomValidity('')" required autofocus/>
								<span class="text-danger"><?php echo form_error('user_email'); ?></span>
							</div>
							<div class="form-group">
								<button class="btn btn-large btn-block btnDesign px-0 my-2" type="submit" name="forgot-password">
									<span class="d-inline-block align-middle"><?php echo $lang['PW-button']?></span>
								</button>
							</div>
						</form>
						<div class="row justify-content-end pr-3 pt-2">
							<a href="<?php echo base_url(); ?>index.php/settings_CA" class="previous-page">
								<span><?php echo $lang['backLanding']; ?></span>
							</a>
						</div>
					</div>
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

</html>
