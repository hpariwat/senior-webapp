<?php
include "language_config.php"
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/navbar_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/home_CA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/my_modal.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
	<title><?php echo $lang['Hometitle']?></title>
</head>

<body>
<input type="hidden" value="<?php echo $_SESSION['lang']?>" id="lang" >
<nav class="navbar navbar-expand-lg sticky-top navbar-container">
	<a class="navbar-brand" href="<?php echo base_url();?>index.php/home_CA">
		<img src="<?php echo base_url() ?>assets/img/icons/OA_Home.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fas fa-bars"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-toggler">
		<ul class="navbar-nav ml-auto" >
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/statistics_CA"><?php echo $lang['Statistics']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/feedback_CA"><?php echo $lang['Feedback']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link " href="<?php echo base_url();?>index.php/calendar_CA"><?php echo $lang['Calendar']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/residents_CA"><?php echo $lang['Inhabitants']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>index.php/settings_CA"><?php echo $lang['Settings']?></a><div class="underline"></div></li>
			<li class="nav-item"><a class="nav-link" href="#">|</a></li>
			<li class="nav-item"><a class="nav-link" id="link-logout"><?php echo $lang['Log_out']?></a><div class="underline"></div></li>
		</ul>
	</div>
</nav>

<div class="view my-view">
	<div class="container pt-4 pb-1">
		<div class="card-deck">
			<div class="card card-big">
				<div class="card-header card-header-todo">
					<div class="right"><?php echo $lang['Personal']?></div>
					<div><?php echo $lang['TODO']?></div>
				</div>
				<div class="card-body card-body-todo">
					<div id="accordion1">
						<?php
						foreach ($private as $key=>$note){
							echo '	<div class="card card-content-todo mb-3" id="common-card-' . $note['noteID'] .'">
										<a data-toggle="collapse" data-target="#v' . $key .'">
											<div class="card-body card-list-todo">
												<button class="btn-check" onclick="hideNote(' . $note['noteID'] . ')"><i class="fas fa-check fa-sm"></i></button>'
								. $note['note'] . '
												<div id="v' . $key .'" class="collapse" data-parent="#accordion1">
													<hr>
													<i class="far fa-clock mr-2"></i>' . $note['date'] . '
													<br>
													<i class="fas fa-eye mr-2 mt-2"></i>Only Me
												</div>
											</div>
										</a>
									</div>				
							';
						}
						?>
					</div>
				</div>

				<div class="text-center card-footer-todo">
					<br>
					<a class="btn btn-round-add" href="#add-personal-todo" data-toggle="modal" data-target="#add-personal-todo">
						<i class="fas fa-plus mt-2"></i>
					</a>
				</div>

			</div>

			<div class="card card-big">

				<div class="card-header card-header-todo">
					<div class="right"><?php echo $lang['Common']?></div>
					<div><?php echo $lang['TODO']?></div>
				</div>
				<div class="card-body card-body-todo">
					<div id="accordion2">
						<?php
						foreach ($shared as $note){
							echo '	
							<div class="card card-content-todo mb-3" id="common-card-' . $note['noteID'] .'">
								<a data-toggle="collapse" data-target="#z' . $note['noteID'] .'">
									<div class="card-body card-list-todo">
									
											<!--<i class="far fa-check-square fa-lg mr-1 mt-1 ml-2" style="float:right" onclick="hideNote(' . $note['noteID'] . ')"></i>-->
											<button class="btn-check" onclick="hideNote(' . $note['noteID'] . ')"><i class="fas fa-check fa-sm"></i></button>'
								/*. $note['date'] . '<br>'*/
								. $note['note'] . '
										<div id="z' . $note['noteID'] .'" class="collapse" data-parent="#accordion2">
												<hr>
												<i class="far fa-clock mr-2"></i>' . $note['date'] . '
												<br>
												<i class="fas fa-user mr-2 mt-2"></i>' . $note['author'] . '
												<br>
												<i class="fas fa-eye mr-2 mt-2"></i>' . $note['sharewith'] . '
												<!--<i class="fas fa-edit fa-md mr-1 mt-2 ml-2" id="edit-btn" style="float:right"></i>-->
										</div>
										
									</div>
								</a>
								
							</div>				
							';
						}
						?>
					</div>
				</div>
				<div class="text-center card-footer-todo">
					<br>
					<a class="btn btn-round-add" href="#add-todo" id="btn-common" data-toggle="modal" data-target="#add-todo">
						<i class="fas fa-plus mt-2"></i>
					</a>
				</div>
			</div>
			<div class="card card-big" id="card-command">
				<div class="card-header text-center card-header-command">
					<div><?php echo $lang['Command']?></div>
				</div>
				<div class="card-body card-body-command pb-0" id="siri-space">
					<p class="card-text"><?php echo $lang['Micro_text']?></p>
					<form>
						<textarea class="form-control" id="DEBUG_MESSAGE" rows="3" readonly></textarea>
					</form>

					<br>
					<div id="siri-container" class="text-center"></div>
				</div>
				<div class="text-center card-footer-todo">
					<br>
					<a class="btn btn-round-mic" id="btnGiveCommand">
						<i class="fas fa-microphone mt-2" style="color: white"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="view" style="/*background-color: #f1f1f1*/">
			<div class="title pt-2 pb-2">

			</div>
			<div class="card-deck">
				<?php
				for ($i = 0; $i<3; $i++) {
					echo "<div class='card activities'>";
					echo "<h4 class='card-title pt-2'><b>" . $activities[$i]['title'] . "</b></h4>";
					echo "<h5>" . $activities[$i]['start_date'];
					if ($activities[$i]['all_day'] == 1) {
						echo "</h5>";
					} else {
						echo " " . $activities[$i]['start_time'] . "</h5>";
					}

					echo "<p class='card-text  pt-2 pb-2' id='text-truncate'>" . $activities[$i]['description'] . "</p>";
					echo "</div>";
				}
				?>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add-todo" tabindex="-1" role="dialog" aria-labelledby="add-todo" aria-hidden="true" >
		<div class="modal-dialog" role="document">
			<div class="modal-content my-modal-content">
				<div class="modal-header my-modal-header">
					<h5 class="modal-title"><i class="fas fa-users mr-2"></i><?php echo $lang["Add_task_common"]?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body my-modal-body">
					<form id="change-info" method="post" action="<?php echo base_url(); ?>index.php/home_CA/addnote">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="name"><?php echo $lang["New_note"]?></label>
									<textarea maxlength="480" class="form-control" id="task_name" name="t_task_name" placeholder="" oninvalid="this.setCustomValidity('Enter Task Name')" oninput="setCustomValidity('')" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12" id="sharewith">
								<div class="form-group">
									<label><i class="fas fa-share-alt mr-2 mt-2"></i><?php echo $lang["Share_with"]?></label>
									<br>
									<div class="btn-group" role="group">
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="select-caregivers" name="t_cg" <?php if($_SESSION['ca_function'] == 'caregiver'){echo 'disabled checked';}?>>
											<label class="custom-control-label" for="select-caregivers"><?php echo $lang['Caregiver']?></label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="select-entertainers" name="t_et" <?php if($_SESSION['ca_function'] == 'entertainer'){echo 'disabled checked';}?>>
											<label class="custom-control-label" for="select-entertainers"><?php echo $lang['Entertainer']?></label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="select-volunteers" name="t_vt" <?php if($_SESSION['ca_function'] == 'volunteer'){echo 'disabled checked';}?>>
											<label class="custom-control-label" for="select-volunteers"><?php echo $lang['Volunteer']?></label>
										</div>
										<?php if($_SESSION['ca_function'] == 'caregiver'){echo '<input name="t_cg" type="hidden" value="on"/>';}?>
										<?php if($_SESSION['ca_function'] == 'entertainer'){echo '<input name="t_et" type="hidden" value="on"/>';}?>
										<?php if($_SESSION['ca_function'] == 'volunteer'){echo '<input name="t_vt" type="hidden" value="on"/>';}?>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer pb-0 pr-0">
							<button type="submit" class="btn btn-plus btn-add-task"><i class="fas fa-plus mr-2"></i><?php echo $lang['Add']?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="add-personal-todo" tabindex="-1" role="dialog" aria-labelledby="add-personal-todo" aria-hidden="true" >
		<div class="modal-dialog" role="document">
			<div class="modal-content my-modal-content">
				<div class="modal-header my-modal-header">
					<h5 class="modal-title"><i class="fas fa-tasks mr-2"></i><?php echo $lang['Add_task_pers']?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body my-modal-body">
					<form id="change-info" method="post" action="<?php echo base_url(); ?>index.php/home_CA/addpersonalnote">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="name"><?php echo $lang['New_note']?></label>
									<textarea maxlength="480" class="form-control" id="task_name" name="tp_task_name" placeholder="" oninvalid="this.setCustomValidity('Enter Task Name')" oninput="setCustomValidity('')" required></textarea>
								</div>
							</div>
						</div>
						<p><i class="fas fa-eye mr-2 mt-2"></i><?php echo $lang["Only_me_can_see"]?></p>
						<div class="modal-footer pb-0 pr-0">
							<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
							<button type="submit" class="btn btn-plus btn-add-task"><i class="fas fa-plus mr-2"></i><?php echo $lang["Add"]?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="edit-todo" tabindex="-1" role="dialog" aria-labelledby="edit-todo" aria-hidden="true" >
		<div class="modal-dialog" role="document">
			<div class="modal-content my-modal-content">
				<div class="modal-header my-modal-header">
					<h5 class="modal-title"><i class="fas fa-tasks mr-2"></i><?php echo $lang["Add_task_pers"]?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body my-modal-body">

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="confirm-hide" tabindex="-1" role="dialog" aria-labelledby="confirm-hide" aria-hidden="true" >
		<div class="modal-dialog" role="document">
			<div class="modal-content my-modal-content">
				<div class="modal-header my-modal-header">
					<h5 class="modal-title"><i class="fas fa-tasks mr-2"></i><?php echo $lang["Mark_Done"]?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body my-modal-body">
					<p><?php echo $lang["Text_home"]?></p>
					<div class="modal-footer pb-0 pr-0">
						<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal"><i class="fas fa-times mr-2"></i>No</button>
						<button type="submit" class="btn btn-add-task" id="btn-confirm-hide"><i class="fas fa-check mr-2"></i>Yes</button>
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

	<div id="preloading-overlay">
		<div class="lds-hourglass"></div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/siriwave/dist/siriwave.js"></script>
<script src="<?php echo base_url()?>scripts/STT_CareGiverHome.js"></script>
<script src="<?php echo base_url()?>scripts/home_CA.js"></script>
<script src="<?php echo base_url() ?>/scripts/logout_confirmation.js"></script>
</html>
