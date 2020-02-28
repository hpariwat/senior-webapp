<?php
include "language_config.php"
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Reguired meta tags -->
	<title><?php echo $lang['Title']?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
		  integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/navbar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/statistics_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>
<!-- JAVASCRIPT VARIABLES-->
<input type="hidden" id="yearStats">
<input type="hidden" id="lang" value="<?php echo $_SESSION['lang']?>">
<!-- END JAVASCRIPT VARIABLES-->
<nav class="navbar navbar-expand-lg sticky-top navbar-container">
	<a class="navbar-brand" href="<?php echo base_url()?>index.php/home_CA">
		<img src="<?php echo base_url()?>assets/img/icons/OA_Home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fas fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<ul class="navbar-nav ml-auto" >
			<li class="nav-item active-link"><a class="nav-link" href="#"><?php echo $lang['Statistics']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/feedback_CA"><?php echo $lang['Feedback']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link " href="<?php echo base_url()?>index.php/calendar_CA"><?php echo $lang['Calendar']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/residents_CA"><?php echo $lang['Inhabitants']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/settings_CA"><?php echo $lang['Settings']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" id="link-logout"><?php echo $lang['Log_out']?></a><div class="underline"></div></li>
		</ul>
	</div>
</nav>

<div class="container-fluid">
	<!-- ROW: ALL ELEMENTS -->
	<div class="row">
		<!-- COL: LEFT SIDE -->
		<div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 graph-area ">
			<!-- ROW: QUICKLOOK AND FEEDBACK -->
			<div class="row">
				<!-- QUICKLOOK -->
				<div class="col-xl-6 pt-3 pb-3">
					<!-- QUICKLOOK CARD -->
					<div class="card my-card w-100 h-100 shadow">
						<div class="card-header card-header-quicklook pb-0">
							<p><?php echo $lang['Quick_view']?></p>
						</div>
						<div class="card-body pt-0">
							<div class="card-body pt-0 pb-0">
								<div class="row h-100 justify-content-around">
									<div class="col-md-5 col-sm-6 text-quicklook text-center">
										<div>
											<p><?php echo $lang['Avg_score']?></p>
										</div>
										<div class="text-center">
											<div class="progress mx-auto" data-value='0' id="dntAvgScore">
												<span class="progress-left">
													<span class="progress-bar border-info"></span>
												</span>
												<span class="progress-right">
													<span class="progress-bar border-info"></span>
												</span>
												<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
													<div class="h2 font-weight-bold" id="textAvgScore"><div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-5 col-sm-6 text-quicklook text-center">
										<div><p><?php echo $lang["Amount_participants"]?></p></div>
										<div class="text-center">
											<div class="progress mx-auto" data-value='0' id="dntNrParticipants">
											<span class="progress-left">
												<span class="progress-bar border-info"></span>
											</span>
											<span class="progress-right">
												<span class="progress-bar border-info"></span>
											</span>
											<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
												<div class="h2 font-weight-bold" id="textNrParticipants"><div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></div>
											</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- FEEDBACK -->
				<div class="col-xl-6 pt-3 pb-3 text-center">
					<!-- FEEDBACK CARD -->
					<a href="<?php echo base_url();?>index.php/statistics_Feedback_CA" class="btn btn-feedback w-100 h-100 shadow"><?php echo $lang["Statistics_feedback"]?><br><p>Go<i class="fas fa-chevron-right"></i></p></a>
				</div>
			</div>

			<!-- ROW: YEAR OVERVIEW -->
			<div class="row">

				<!-- YEAR OVERVIEW -->
				<div class="col pb-3">

					<!-- YEAR OVERVIEW CARD -->
					<div class="card my-card w-100 shadow">
						<div class="card-header card-header-quicklook" ><?php echo $lang["Year_review"]?>
						</div>
						<p style="padding: 0 20px; font-size: 12px;"><?php echo $lang["Year_review_text"]?></p>
						<div class="card-body pt-0">
							<canvas id="mainGraph"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- COL: RIGHT SIDE -->
		<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
			<!-- ROW: CATEGORIES -->
			<div class="row h-100">
				<!-- CATEGORIES -->
				<div class="col pt-3 pb-3 ">
					<!-- CATEGORY CARD -->
					<div class="card my-card my-category-card w-100 h-100 pb-4 shadow">
						<div class="card-header card-header-category pb-0" >
							<div class="trend-top-header">
								<button type="button" class="btn trend-top-btn pl-0" id="btnTop">TOP</button>
								<button type="button" class="btn trend-top-btn pl-0" id="btnTrend">TREND</button>
								<a href="<?php echo base_url();?>index.php/statistics_Categories_CA" class="btn more-info-btn float-right shadow"><i class="fa fa-info mr-2"></i>Meer info</a>
								<p id="text_trendcard"><?php echo $lang["Text_trend"]?></p>
							</div>

						</div>
						<div class="card-body card-body-category pt-0">
							<div class="table-area">
								<table class = "table table-hover table-category" id="table-ranking">
									<tbody>
									<tr id="ranking-row">
										<td>1</td>
										<td id="plc_1_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_1_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>2</td>
										<td id="plc_2_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_2_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>3</td>
										<td id="plc_3_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_3_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>4</td>
										<td id="plc_4_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_4_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>5</td>
										<td id="plc_5_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_5_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>6</td>
										<td id="plc_6_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_6_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>7</td>
										<td id="plc_7_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_7_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>8</td>
										<td id="plc_8_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_8_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>9</td>
										<td id="plc_9_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_9_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>10</td>
										<td id="plc_10_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_10_score"></td>
									</tr>
									<tr id="ranking-row">
										<td>11</td>
										<td id="plc_11_name">Loading... <div class="spinner-border spinner-border-sm" style="color:grey" role="status"></div></td>
										<td id="plc_11_score"></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
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
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body my-modal-body">
				<p><?php echo $lang["Log_out_delete_text"]?></p>
				<div class="modal-footer pb-0 pr-0">
					<form id="btn-logout-confirm" method="post" action="<?php echo base_url(); ?>index.php/home_CA/logout">
						<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal"><i class="fas fa-times mr-2"></i><?php echo $lang["No"]?></button>
						<button type="submit" class="btn btn-yes" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i><?php echo $lang["Yes"]?></button>
					</form>
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

<!-- BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="<?php echo base_url()?>/scripts/statistics_main.js"></script>
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
</html>
