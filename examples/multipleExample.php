<?php

// Include the Class
require '../src/MovieInformation.php';

// Namespace
use SparksCoding\MovieInformation\MovieInformation;

// Get move by title
$movie = new MovieInformation('The Matrix', array('tomatoes'=>'true'));

$multiple = $movie->getMultiple(array('title', 'year', 'genre', 'dvd'));

print_r($multiple);

// Array
// (
//     [title] => The Matrix
//     [year] => 1999
//     [genre] => Action, Sci-Fi
//     [dvd] => 21 Sep 1999
// )