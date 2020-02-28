<?php include "language_config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<title><?php echo $lang['Title']?></title>
</head>

<body>
<div class="container">
	<br>
	<h3 align="center"><?php echo $lang["verification_comp"]?></h3>
	<br>
	<?php
		echo $message;
	?>
</div>
</body>
</html>
