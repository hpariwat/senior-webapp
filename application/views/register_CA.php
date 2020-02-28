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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/landing.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/buttons_cards.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/register_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>
<div class="container">
	<div class="row no-gutter">
		<div class="col-sm-12 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<h5 class="card-title text-center"><?php echo $lang['Register_Me']?></h5>
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
					<form method="post" action="<?php echo base_url(); ?>index.php/register_CA/validation">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $lang['First_name']?></label>
									<input type="text" name="user_first_name" class="form-control" value="<?php echo set_value('user_first_name'); ?>" oninvalid="this.setCustomValidity('Enter First Name')" oninput="setCustomValidity('')" required />
									<span class="text-danger"><?php echo form_error('user_first_name'); ?></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $lang['Last_name']?></label>
									<input type="text" name="user_last_name" class="form-control" value="<?php echo set_value('user_last_name'); ?>" oninvalid="this.setCustomValidity('Enter Last Name')" oninput="setCustomValidity('')" required />
									<span class="text-danger"><?php echo form_error('user_last_name'); ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label><?php echo $lang['Email']?></label>
									<input type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" oninvalid="this.setCustomValidity('Enter Email')" oninput="setCustomValidity('')" required/>
									<span class="text-danger"><?php echo form_error('user_email'); ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="inputState"><?php echo $lang['Lang_pref']?></label>
									<select name="user_language" id="inputState" class="form-control">
										<option value="nl">Nederlands</option>
										<option value="en">English</option>
									</select>
									<span class="text-danger"><?php echo form_error('user_language'); ?></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="inputState"><?php echo $lang['Choose_func']?></label>
									<select name="user_function" id="inputState" class="form-control">
										<option value="caregiver"><?php echo $lang['Caregiver']?></option>
										<option value="entertainer"><?php echo $lang['Entertainer']?></option>
										<option value="volunteer"><?php echo $lang['Volunteer']?></option>
									</select>
									<span class="text-danger"><?php echo form_error('user_function'); ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label><?php echo $lang['Password']?></label>
									<div class="input-group">
										<input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" data-toggle="password" oninvalid="this.setCustomValidity('Enter Password')" oninput="setCustomValidity('')" required/>
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-eye-slash"></i></div>
										</div>
										<span class="text-danger"><?php echo form_error('user_password'); ?></span>
									</div>
								</div>
							</div>
						</div>
						<form class="form-group">
							<button class="btn btn-lg btn-primary btn-block btn-register" type="submit" name="register" value="Register"><?php echo $lang['Register']?></button>
						</form>
					</form>
					<div class="my-link text-center pt-3 pb-1">
						<a href="<?php echo base_url(); ?>index.php/login_CA"><?php echo $lang['backLanding']?></a>
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
<script src="<?php echo base_url() ?>/scripts/show_password.js"></script>
<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>
</html>
