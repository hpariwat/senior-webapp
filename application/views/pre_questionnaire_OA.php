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

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pre_questionnaire_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">

	<!-- Font Icons -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<!-- ONBOARDING -->
<button class="help_button" onclick="StartOnboarding()">
	<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help.svg" alt="help button">
</button>

<!-- HEADER -->
<div class="container-fluid">
	<div class="row brown-bar">
		<div class="col indent">
			<a href="<?php echo base_url(); ?>index.php/home_OA/index">
				<button class="btnHome px-2 my-2">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Home_White.svg" alt="Home" class="iconSize">
					<span class="d-inline-block align-middle"><?php echo $lang['Starting_page']?></span>
				</button>
			</a>
		</div>
	</div>
</div>

<!-- ACTUAL PAGE -->
<div class="container">

	<!-- Question/title "Push correct questionnaire"-->
	<div class="row p-4 p-md-5">
		<div class="col-12 d-flex align-items-center justify-content-center">
			<span class="text-center"><?php echo $lang['Pre_title']?></span>
		</div>
	</div>

	<!-- BUTTONS interRAI or feedback CA-->
	<div class="row h-50" id="rowBtns">
		<!-- Button interRAI-->
		<div class="col-12 col-md-6 py-3 d-flex justify-content-center">
			<a class="btnDesign text-decoration-none" href="<?php echo base_url(); ?>index.php/question_OA/index">
				<button class="btn btn-light" type="submit" id="btnInterRAI">
					<span><?php echo $lang['InterRAI_title']?></span>
				</button>
			</a>
		</div>
		<!-- Button feedback CA -->
		<div class="col-12 col-md-6 py-3 d-flex align-items-center justify-content-center">
			<a class="btnDesign text-decoration-none" href="<?php echo base_url(); ?>index.php/feedback_OA">
				<button class="btn btn-light" type="submit" id="btnQCA">
					<span><?php echo $lang['Feedback_title']?></span>
				</button>
			</a>
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

<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_pre_questionnaire_OA.js"></script>
</html>
