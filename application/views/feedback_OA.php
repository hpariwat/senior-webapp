<?php
include "language_config.php"
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- BOOTSTRAP CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/question_OA.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">

	<!-- FONT ICONS -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">

	<title><?php echo $lang['Title']?></title>
</head>

<body>
<!-- JAVA VARIABLES -->
<input id="text_question_nl" type="hidden" value="<?php echo $question_nl?>">
<input id="text_question_en" type="hidden" value="<?php echo $question_en?>">
<input id="lang" type="hidden" value="<?php echo $_SESSION['lang'] ?>">

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

	<!-- QUESTION SECTION -->
	<!-- Part 1: topic + bar -->
	<div class="row qSection flex-fill">
		<!-- TOPIC -->
		<div class="col-12 indent d-flex align-items-center">
			<span class="d-inline-block text-white py-3"><?php echo $lang['Feedback_title']?></span>
		</div>
		<!-- HELP BUTTON -->
		<button class="help_button" onclick="StartOnboarding()">
			<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help.svg" alt="help button">
		</button>
	</div>
	<!-- Part 2: question -->
	<div class="row qSection pb-4 pt-4">
		<!-- QUESTION -->
		<div class="col-8 indentL pr-0">
			<div class="h-100 w-100 question  d-flex align-items-center text-justify">
				<span class="p-2"><?php
					if($this->session->lang == 'en') {
						echo $question_en;
					}else{
						echo $question_nl;
					}?></span>
				<input id="text_question" type="hidden" value="<?php echo $question_nl?>">
			</div>
		</div>
		<div class="col-4 indentR pl-0 ">
			<div class="h-100 w-100 read d-flex align-items-center justify-content-center">
				<button class="btn" id="Read_Out">
					<img class="soundSize" src="<?php echo base_url(); ?>assets/img/icons/volume.svg" alt="Read Out Loud">
					<span class="align-middle soundSize text-white"><?php echo $lang['Read_out']?></span>
				</button>
			</div>
		</div>
	</div>
	<!-- ANSWER SECTION -->
	<div class="row pt-2 aSection flex-fill">
		<div class="col-12">
			<!-- ANSWER BUTTONS -->
			<div class="row indent justify-content-between" id="answers">
				<!-- BUTTON NEVER -->
				<div class="containerSpan pl-0 pr-1 py-3">
					<button id="one" class="btn p-0" onclick="document.getElementById('score').setAttribute('value','0');" value="1">
						<img id="imgNever" class="imgAnswer" src="<?php echo base_url();?>assets/img/icons/Never.svg" alt="Button Never">
						<span class="centerTextOnSpan"><?php echo $lang['Never']?></span>
					</button>
				</div>
				<!-- BUTTON SELDOM -->
				<div class="containerSpan pl-0 pr-1 py-3">
					<button id="two" class="btn p-0" onclick="document.getElementById('score').setAttribute('value','1');" value="2">
						<img id="imgSeldom" class="imgAnswer" src="<?php echo base_url();?>assets/img/icons/Seldom.svg" alt="Button Seldom">
						<span class="centerTextOnSpan"><?php echo $lang['Seldom']?></span>
					</button>
				</div>
				<!-- BUTTON SOMETIMES -->
				<div class="containerSpan pl-0 pr-1 py-3">
					<button id="three" class="btn p-0" onclick="document.getElementById('score').setAttribute('value','2');" value="3">
						<img id="imgSometimes" class="imgAnswer" src="<?php echo base_url();?>assets/img/icons/Sometimes.svg" alt="Button Sometimes">
						<span class="centerTextOnSpan"><?php echo $lang['Sometimes']?></span>
					</button>
				</div>
				<!-- BUTTON OFTEN -->
				<div class="containerSpan pl-0 pr-1 py-3">
					<button id="four" class="btn p-0" onclick="document.getElementById('score').setAttribute('value','3');" value="4">
						<img id="imgOften" class="imgAnswer" src="<?php echo base_url();?>assets/img/icons/Often.svg" alt="Button Often">
						<span class="centerTextOnSpan"><?php echo $lang['Often']?></span>
					</button>
				</div>
				<!-- BUTTON ALWAYS -->
				<div class="containerSpan pl-0 pr-1 py-3">
					<button id="five" class="btn p-0" onclick="document.getElementById('score').setAttribute('value','4');" value="5">
						<img id="imgAlways" class="imgAnswer" src="<?php echo base_url();?>assets/img/icons/Always.svg" alt="Button Always">
						<span class="centerTextOnSpan"><?php echo $lang['Always']?></span>
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER SECTION -->
	<div class="row pt-1 pb-3 aSection flex-shrink-1">
		<div class="col-12">
			<!-- FOOTER (previous, next, micro) -->
			<div class="row h-100 indent justify-content-between">
				<!-- BTN Previous question -->
				<!--<a href="php echo base_url();?>index.php/pre_questionnaire_OA/index">
					<button class="btn btnFooter" id="btnPrevious">
						<span class="d-inline-block align-middle">php echo $lang['Previous']?></span>
					</button>
				</a>-->
				<!-- BTN Micro -->
				<button class="btn btnFooter" id="Voice_Answer">
					<span class="d-inline-block align-middle"><?php echo $lang['Micro']?></span>
				</button>
				<!-- BTN Next question -->
				<form action="<?php echo base_url();?>index.php/feedback_OA/submit" id="numberForm" method="get">
					<input type="hidden" id="score" value="" name="score">
					<button class="btn h-100 btnFooter" type="submit" id="btnSubmit">
						<span class="d-inline-block align-middle"><?php echo $lang['Next']?></span>
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="preloading-overlay">
	<div class="lds-hourglass"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>scripts/TTS_Feedback_oa.js"></script>
<script src="<?php echo base_url(); ?>scripts/STT_Questionnaire.js"></script>
<script src="<?php echo base_url(); ?>scripts/btnNumbers_Questionnaire.js"></script>
<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_feedback_OA.js"></script>
</body>

