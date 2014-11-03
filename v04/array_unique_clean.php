<?php

$multiCity = array_map('str_getcsv', file('data.csv'));

var_dump($multiCity);

// Mapping function that maps an element to the key to count
$keyFunction = function($element) {
	// Third element is the continent
	return $element[2];
};

$keys = array();
foreach($multiCity as $element) {
	$keys[$keyFunction($element)]++;
}

var_dump($keys);

?>