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
						<form method="post" action="<?php echo base_url(); ?>index.php/reset_request/change_password">
							<h2 class="card-title"><?php echo $lang['Change_new_password']?></h2>
							<div class="form-group">
								<input type="password" name="user_new_password" class="form-control" value="<?php echo set_value('user_new_password'); ?>" />
								<span class="text-danger"><?php echo form_error('user_new_password'); ?></span>
							</div>
							<div class="form-group">
								<button class="btn btn-lg btn-primary btn-block btnDesign" type="submit" name="change-password">
									<?php echo $lang['Change_password']?>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
