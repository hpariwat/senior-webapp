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
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/landing.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
</head>

<body>
<!-- Full Page Intro -->
<div class="view">

	<!-- SELECT LANGUAGE -->
	<div class="dropdown">
		<button class="btn taalBtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $lang['Select'];?>
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/landing?lang=nl"><span class="flag-icon flag-icon-nl"> </span><span class="pl-2"><?php echo $lang['NED'];?><span></a>
			<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/landing?lang=en"><span class="flag-icon flag-icon-gb"> </span><span class="pl-2"><?php echo $lang['UK'];?><span></span></a>
		</div>
	</div>

	<!-- HELP BUTTON -->
	<button class="pr-sm-5 help_button" onclick="StartOnboarding()">
		<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help.svg" alt="help button">
	</button>

	<div class="container helper h-100">
		<!-- Question/title"Who are you?"-->
		<div class="row py-4 py-md-5" id="rowTitle">
			<div class="col-12 text-center">
				<span><?php echo $lang['WhoAreYou']?></span>
			</div>
		</div>
		<!-- Buttons to select OA or CA -->
		<div class="row h-50" id="rowBtns">
			<div class="col-12 col-md-6">
				<!-- Button Older Adults -->
				<form class="w-100 h-100 p-4 p-sm-5 d-flex align-items-center justify-content-center" action="<?php echo base_url();?>index.php/login_OA">
					<a class="btnDesign text-decoration-none" href="<?php echo base_url(); ?>index.php/login_OA/index">
						<button class="btn btn-light button1" type="submit">
							<img src="<?php echo base_url(); ?>assets/img/icons/Older_Adults.svg" alt="icon older adults"/>
							<span><?php echo $lang['Resident'];?></span>
						</button>
					</a>
				</form>
			</div>
			<div class="col-12 col-md-6">
				<!-- Button Caregivers -->
				<form class="w-100 h-100 p-4 p-sm-5 d-flex align-items-center justify-content-center" action="<?php echo base_url();?>index.php/login_CA">
					<a class="btnDesign text-decoration-none" href="<?php echo base_url(); ?>index.php/login_OA/index">
						<button class="btn btn-light button2" type="submit">
							<img src="<?php echo base_url(); ?>assets/img/icons/Caregiver_Woman.svg" alt="icon caregiver"/>
							<span><?php echo $lang['Caregiver'];?></span>
						</button>
					</a>
				</form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_landing.js"></script>
</html>
