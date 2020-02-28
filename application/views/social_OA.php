<?php
include "language_config.php"
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<title>Team 1</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/icons/tablogo.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
		  integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/shepherd.js/dist/css/shepherd.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_OA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/social_OA.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/emojis.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/preloading.css">
</head>

<body>
<div class="container-fluid d-flex flex-column h-100">
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
	<div class="row" id="dink">
		<!-- LEFT PANEL, SOCIAL CARDS -->
		<div class="col-md-3 p-4 social-list">
			<div class="card social-card card-one">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="mr-2">
							<i class="fas fa-user-circle fa-2x"></i>
						</div>
						<div class="ml-2">
							<div class="h5 m-0">Emma Peeters</div>
							<div class="h7 text-muted"><?php echo $lang['Daughter']?></div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="card social-card card-two">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="mr-2">
							<i class="fas fa-user-circle fa-2x"></i>
						</div>
						<div class="ml-2">
							<div class="h5 m-0">David Peeters</div>
							<div class="h7 text-muted"><?php echo $lang['Son']?></div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="card social-card card-three">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="mr-2">
							<i class="fas fa-user-circle fa-2x"></i>
						</div>
						<div class="ml-2">
							<div class="h5 m-0">Alexander Mertens</div>
							<div class="h7 text-muted"><?php echo $lang['Grand_Son']?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 p-0 social-content">
			<div class="row pt-4">
				<div class="col-1"></div>
				<div class="col-9">
					<h2><ins>Emma Peeters</ins></h2>
				</div>
				<div class="col-1">
					<!-- HELP BUTTON -->
					<button class="help_button float-right" onclick="StartOnboarding()">
						<img src="<?php echo base_url(); ?>assets/img/icons/Icon_Help2.svg" alt="help button">
					</button>
				</div>
			</div>

			<!-- SOCIAL PHOTOS -->
			<div class="row pt-4 pb-4">
				<div class="col-1"></div>
				<div class="col-10">
					<div class="pa-carousel-widget social-slider"
						 data-link="https://photos.google.com/u/2/share/AF1QipN9Fdt6pUEbV9pArqDDRzHTJ1VEMRiy_0GH6wJlm61kBQFBKLeli5Lvbm68vx-LQA?key=U0tnOEkybENEZDdscGxzMTI2U1RXalpTVWJiOFVB"
						 data-description="6 new photos added to shared album">
						<object data="https://lh3.googleusercontent.com/1wpmOCc3zOS6XzoeuSLgEVllcD3VC0cMJdH5laTL4-VqwW08t0y3Kkqa4ynIOFLE_Y1kfP7iinEWIE_-pFH5DbgMsEKiaXpQ3C4cD1vDUrAVQdhwm-uRzGADCXwKRbBQhHe34Dx1=w1920-h1080"></object>
						<object data="https://lh3.googleusercontent.com/YyDTyrml9VulNG6_VI6VMBxkOQ_L-VkI-WL6jskkuGGb7oRLuEd5HnAXF4c9Xg2v53oGtpBoON9Ae0OqxPTS8kqWTBbImBR2o9fowCuRBrf7rIut3ciukI_TlEFpyGKPTkUUVXig=w1920-h1080"></object>
						<object data="https://lh3.googleusercontent.com/P7vG_C_t9yjzNjfOPcwmVfve7REyIhm7wB_Q9lGEqgVgVRLXRZUpx8ADZboQO4z7lrGc4VMnZDQWv3jEusoJNe2qIiNY6-Q3csaRtRI8sgHW7_mHP5_CjOMZ7uCmZQNjc624dhCYUw=w1920-h1080"></object>
						<object data="https://lh3.googleusercontent.com/iYXFXXVPq4Kkx9kzEXu9sGRkNXdfptlA-iob349FfPoNYjbA983MN7x2BTubQohIEZ38vgH6JQRY8cH-cmkxs1_TeSmdqx0v6UO-rkUBhaRTVw4nGJZgQhnfyaTAT7brZDfqnlb3YQ=w1920-h1080"></object>
						<object data="https://lh3.googleusercontent.com/ap94rG04rkafSBZhAVTFGiNhzxGJDGZsqmYDjfQsCXaO1oBeV9bxvOlUJMMH-ZSxhSLKnJOgCrAfhxraSdOO4JfxUHowv88pXMRxiL_nIv9kJ0LqITyPsf0pZEedaOdSesrbWJ8j=w1920-h1080"></object>
						<object data="https://lh3.googleusercontent.com/vPuO2t4v8O4N3ThGs6nrWi2rG7CvrXmp1c6FbG_c3gM8yLxKryHBq14yOHYWvPOMJtkUNFgO4mOfR_WzGtmvo1dOCITIP9Owm8ka-3EzALSwJi7wRfPTWn-cwKiHbmqygGaK_mjp=w1920-h1080"></object>
					</div>
				</div>
			</div>

			<!-- QUESTION -->
			<div class="row pt-6">
				<div class="col-1"></div>
				<div class="col-10">
					<h5><?php echo $lang['social_react_text']?></h5>
				</div>
			</div>

			<!-- EMOJIS -->
			<div class="row emojis">
				<div class="col-1"></div>
				<div class="col-10 container">
					<div class="emoji love">
						<figure class="face">
        					<span class="eyes">
          						<span class="heart-eye">
            						<span class="heart"></span>
								</span>
          						<span class="heart-eye">
            						<span class="heart"></span>
          						</span>
        					</span>
							<span class="mouth tounge"></span>
						</figure>
					</div>
					<div class="emoji smile">
						<figure class="face">
        					<span class="eyes">
          						<span class="eye"></span>
          						<span class="eye"></span>
        					</span>
							<span class="mouth"></span>
						</figure>
					</div>
					<div class="emoji shocked">
						<figure class="face">
      					  	<span class="eyes">
          						<span class="eye"></span>
          						<span class="eye"></span>
        					</span>
							<span class="mouth"></span>
						</figure>
					</div>
					<div class="emoji speechless">
						<figure class="face">
       						 <span class="eyes">
								 <span class="eye"></span>
								 <span class="eye"></span>
							 </span>
							<span class="mouth"></span>
						</figure>
					</div>
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

<script src="https://cdn.jsdelivr.net/npm/publicalbum@latest/embed-ui.min.js" async></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/shepherd.js@latest/dist/js/shepherd.js"></script>
<script src="<?php echo base_url(); ?>/scripts/onboarding_social_OA.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
<script src="<?php echo base_url() ?>/scripts/loading_animation.js"></script>
</html>
