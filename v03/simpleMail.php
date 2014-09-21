<?php

session_start();

ini_set ('error_reporting', E_ALL);
error_reporting(E_ALL);


if(isset($_SESSION['gesendet1']) && !empty($_SESSION['gesendet1'])){
		$gesendet1 = $_SESSION['gesendet1'];
	}else{
		$gesendet1 =0;
	}	

	
	
	$empfaenger = "xobe@zhaw.ch";
	$absendername = "PhpTester";
	$absendermail = "zaniyar@choix.me";
	$betreff = "PHP ist toll";
	$text = "<h1>Hallo</h1>Wir testen hier nur! <br> Test";
	$extra = "From: $absendername <$absendermail>\n";
	$extra .= "Content-Type: text/html\n";
	$extra .= "Content-Transfer-Encoding: 8bit\n";

if($gesendet1 == 0){  // nur einmal senden!
	mail($empfaenger, $betreff, $text, $extra);
	}else{
	echo "Mail bereits gesendet";
	}

?>
