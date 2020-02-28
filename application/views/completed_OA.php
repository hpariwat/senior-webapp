<?php include "language_config.php"  ?>
<!doctype html>
<html lang="en">
<head>

	<title><?php echo $lang['Title']?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/completed_OA.css">

	<!-- Font Icons -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>

<div class="container-fluid d-flex flex-column h-100">
	<!-- HEADER SECTION -->
	<div class="row brown-bar">
		<div class="col-12 indent">
			<!-- BUTTON HOME -->
			<a href="<?php echo base_url(); ?>index.php/home_OA/index">
				<button class="btnHome px-2 my-2">
					<img src="<?php echo base_url(); ?>assets/img/icons/OA_Home_White.svg" alt="Home" class="iconSize">
					<span class="d-inline-block align-middle"><?php echo $lang['Starting_page']?></span>
				</button>
			</a>
		</div>
	</div>

	<!-- BODY SECTION -->
	<div class="row flex-fill">
		<div class="col-12 indent py-xs-3 py-5 d-flex align-items-start justify-content-center">
			<!-- CARD -->
			<div class="card align-items-center">
				<div class="card-body">
					<!-- CUP LOGO -->
					<div class="row rSize align-items-center justify-content-center">
						<img src="<?php echo base_url(); ?>assets/img/icons/Cup.svg" alt="Cup logo">
					</div>
					<!-- CONGRATS -->
					<div class="row rSize align-items-center justify-content-center">
						<span id="congrats"><?php echo $lang['Congratulations']?></span>
					</div>
					<!-- COMPLETED -->
					<div class="row rSize align-items-center justify-content-center">
						<span class="text-center pt-3 w-70" id="completed"><?php echo $lang["Comp_this_month"]?></span>
					</div>
					<!-- BUTTON HOMEPAGE -->
					<div  class="row rSize">
						<div class="col-12 pt-4 d-flex align-items-center justify-content-center">
							<a href="<?php echo base_url(); ?>index.php/home_OA/index">
								<button class="btnDesign px-0 my-2">
									<img src="<?php echo base_url(); ?>assets/img/icons/OA_Home_White.svg" alt="Home">
									<span class="d-inline-block align-middle"><?php echo $lang["Back_strt_page"]?></span>
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

</html>
