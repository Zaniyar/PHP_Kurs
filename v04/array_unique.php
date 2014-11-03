<?php

$multiCity = array(
	// City, Country, Continent),
	array('Tokyo', 'Japan', 'Asia'),
	array('Mexico City','Mexico', 'North America'),
	array('New York City', 'USA', 'North America'),
	array('Mumbai', 'India', 'Asia'),
	array('Seoul', 'Korea', 'Asia'),
	array('Shanghai', 'China', 'Asia'),
	array('Lagos', 'Nigeria', 'Africa'),
	array('Buenos Aires', 'Argentina', 'South America'),
	array('Cairo', 'Egypt', 'Africa'),
	array('London', 'UK','Europe')
);

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