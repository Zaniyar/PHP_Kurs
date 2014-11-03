<?php

class City {
	public $city;
	public $country;
	public $continent;

	public function __construct($city, $country, $continent) {
		$this->city = $city;
		$this->country = $country;
		$this->continent = $continent;
	}
}

$multiCity = array(
	new City('Tokyo', 'Japan', 'Asia'),
	new City('Mexico City', 'Mexico', 'North America'),
	new City('New York City', 'USA', 'North America'),
	new City('Mumbai', 'India', 'Asia'),
	new City('Seoul', 'Korea', 'Asia'),
	new City('Shanghai', 'China', 'Asia'),
	new City('Lagos', 'Nigeria', 'Africa'),
	new City('Buenos Aires', 'Argentina', 'South America'),
	new City('Cairo', 'Egypt', 'Africa'),
	new City('London', 'UK', 'Europe')
);

// MAP
// Mapping function that maps an element to the key to count
$keyFunction = function($element) {
	// Third element is the continent
	return $element->continent;
};

// REDUCE
$keys = array();
foreach($multiCity as $element) {
	$keys[$keyFunction($element)]++;
}

var_dump($keys);

?>