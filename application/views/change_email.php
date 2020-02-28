<?php include "language_config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<title><?php echo $lang['Title']?></title>
	<meta charset="UTF-8">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset_password.css">
</head>
<body>
<div class="view">
	<div class="container">
		<div class="row">
			<!-- Card with input fields and login button -->
			<div class="col-12 mx-auto">
				<div class="card mx-auto m-5">
					<div class="card-body">
						<form method="post" action="<?php echo base_url(); ?>index.php/change_email_CA/change_email">
							<h2 class="card-title"><?php echo $lang["Choose_new_mail"]?></h2>
							<div class="form-group">
								<input type="email" name="user_new_email" value="<?= set_value('user_new_email') ?>" class="form-control" placeholder="<?php echo $lang['PH-new']?>"
									   oninvalid="this.setCustomValidity('<?php echo $lang['CA_email_label']?>')"
									   oninput="setCustomValidity('')" required autofocus/>
								<span class="text-danger"><?php echo form_error('user_new_email'); ?></span>
							</div>
							<div class="form-group">
								<input type="email" name="user_rep_new_email" value="<?= set_value('user_rep_new_email') ?>" class="form-control" placeholder="<?php echo $lang['PH-confirm']?>"
									   oninvalid="this.setCustomValidity('<?php echo $lang['CA_email_label']?>')"
									   oninput="setCustomValidity('')" required/>
								<span class="text-danger"><?php echo form_error('user_new_email'); ?></span>
							</div>
							<div class="form-group">
								<button class="btn btn-lg btn-block btnLogin" type="submit" name="change-email">
									<?php echo $lang["Change_mail"]?>
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
</body>
</html>
