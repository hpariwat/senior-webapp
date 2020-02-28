<?php
define('__ROOT__', dirname(dirname(__FILE__)));
	if(!isset($_SESSION['lang']))
		$_SESSION['lang'] = "nl";
	// look if language is set or changed, then look if it is not the same,
	// then look if the language is not empty
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
		if($_GET['lang'] == "fr")
			$_SESSION['lang'] = "fr";
		else if ($_GET['lang'] == "nl")
			$_SESSION['lang'] = "nl";
		else if($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
	}
	require_once __ROOT__.'/language/'.$_SESSION['lang'].'.php';
?>
