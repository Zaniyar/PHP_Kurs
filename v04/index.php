<?php
function kosten($anzahl, $preis, $waehrung){
	if(!isset($preis)){
		$preis = 45;
	}
	if(!isset($waehrung)){
	$waehrung "CHF";
	}
	return $anzahl*$preis.$waehrung;
}

echo kosten(10);



?>