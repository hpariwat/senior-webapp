<?php
include "language_config.php"
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">



	<!-- Font Icons -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

	<title><?php echo $lang['Title']?></title>
</head>

<body>
<div class="container-fluid d-flex flex-column h-100">
	<!-- HELP BUTTON -->
	<button class="help_button" onclick="StartOnboarding()">
		<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help.svg" alt="help button">
	</button>

	<!--
	<nav class="navbar navbar-light brown-bar navbar-expand px-0 flex-shrink-0">
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home_OA/index">
				<button class="btn btnHome">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Home_White.svg" alt="Home" class="iconSize">
					<span class="d-inline-block align-middle">Startpagina</span>
				</button>
			</a>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>index.php/home_OA/logout" class="nav-link">
					<button class="btn btnHome">
						<img src="<?php echo base_url(); ?>assets/img/icons/OA_Logout.svg" class="mr-2 iconSize" alt="logout"/>
						<span class="d-inline-block align-middle">Afmelden</span>
					</button>
				</a>
			</li>
		</ul>
	</nav>
	-->

	<!-- HEADER SECTION -->
	<div class="row brown-bar">
		<div class="col-12 indent">
			<a href="<?php echo base_url(); ?>index.php/home_OA/index">
				<button class="btnHome px-2 my-2" id="btnHome">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Home_White.svg" alt="Home" class="iconSize">
					<span class="d-inline-block align-middle"><?php echo $lang['Starting_page']?></span>
				</button>
			</a>
			<a href="#" id="link-logout">
				<button class="btnHome float-right px-2 my-2" id="btnLogout">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Logout.svg" alt="Home" class="iconSize">
					<span class="d-inline-block align-middle"><?php echo $lang['Log_out']?></span>
				</button>
			</a>
		</div>
	</div>

	<!-- WIDGETS SECTION -->
	<div class="row indent align-items-center wSection flex-fill" id="infoSection">
		<!-- NEWS WIDGET -->
		<div class="col-12 col-lg-5 col-xl-6 noPadding news">

			<div class="feedgrabbr_widget float-lg-left" id="fgid_cc6f69825f11fb090db308910"></div>
			<script>if (typeof (fg_widgets) === "undefined") fg_widgets = new Array(); fg_widgets.push("fgid_cc6f69825f11fb090db308910");</script>
			<script async src="https://www.feedgrabbr.com/widget/fgwidget.js"></script>
			<!-- engelse WIDGET
						<div class="feedgrabbr_widget float-lg-left" id="fgid_a90c5285902e816dda7a6daba"></div>
						<script>if (typeof (fg_widgets) === "undefined") fg_widgets = new Array(); fg_widgets.push("fgid_a90c5285902e816dda7a6daba");</script>
						<script async src="https://www.feedgrabbr.com/widget/fgwidget.js"></script> -->
		</div>

					<!-- WEATHER WIDGET -->
		<div class="col-12 col-lg-7 col-xl-6 noPadding weather">
			<div class="feedgrabbr_widget float-lg-right" id="weather">
				<script src="https://apps.elfsight.com/p/platform.js" defer></script> <!--defer-->
				<div class="elfsight-app-1375bc91-f6a8-422e-a6db-e23609b59a44"></div>
			</div>
		</div>
	</div>

	<!-- MENU SECTION (BUTTONS) -->
	<div class="row indent bgBeige align-items-center flex-fill" id="btnSection">
		<div class="col-12 py-3 col-sm-4 text-center noPadding" >
			<a href="<?php echo base_url(); ?>index.php/pre_questionnaire_OA/index">
				<button class="btn btnOA float-sm-left" id="btnQ">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Questionnaire.svg" alt="icon questionnaire" class="svgSize"/>
					<span class="fSize"><?php echo $lang['Questionnaire']?></span>
				</button>
			</a>
		</div>
		<div class="col-12 py-3 col-sm-4 text-center noPadding" >
			<a href="<?php echo base_url(); ?>index.php/calendar_OA/index">
				<button class="btn btnOA" id="btnC">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Calendar.svg" alt="icon calendar" class="svgSize"/>
					<span class="fSize"><?php echo $lang['Calendar']?></span>
				</button>
			</a>
		</div>
		<div class="col-12 py-3 col-sm-4 text-center noPadding" >
			<a href="<?php echo base_url(); ?>index.php/social_OA">
				<button class="btn btnOA float-sm-right" id="btnS">
					<img  src="<?php echo base_url(); ?>assets/img/icons/OA_Social.svg" alt="icon questionnaire" class="svgSize"/>
					<span class="fSize"><?php echo $lang['Social']?></span>
				</button>
			</a>
		</div>
	</div>
</div>

<!-- LOGOUT MODAL HEADER -->
<div class="modal fade" id="modal-logout-confirm" tabindex="-1" role="dialog" aria-labelledby="logout-confirm" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content my-modal-content">
			<div class="modal-header my-modal-header">
				<h5 class="modal-title"><i class="fas fa-sign-out-alt mr-2"></i><?php echo $lang['Log_out']?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
					<span aria-hidden="true" style="font-size: 30px!important;">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<p><?php echo $lang["Log_out_delete_text"]?></p>
				<div class="modal-footer pb-0 pr-0">
					<form id="btn-logout-confirm" method="post" action="<?php echo base_url(); ?>index.php/home_OA/logout">
						<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal"><i class="fas fa-times mr-2"></i><?php echo $lang["No"]?></button>
						<button type="submit" class="btn btn-add" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>

<!-- LOADING ANIMATIONS -->
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
<div id="preloading-overlay">
	<div class="lds-hourglass"></div>
</div>
<script>
	jQuery(window).load(function(){
		jQuery('#preloading-overlay').fadeOut();
	});
</script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>

	/*$( document ).ready(function() {
		console.log( "ready!" );
		//setTimeout(function(){ var x = document.getElementsByTagName("a"); console.log(x);}, 5000);
		//var x = document.getElementsByTagName("a");

	});*/

</script>

<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_home_OA.js"></script>
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
</body>

</html>
