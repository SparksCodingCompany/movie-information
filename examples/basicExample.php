<?php

// Include the Class
require '../src/MovieInformation.php';

// Namespace
use SparksCoding\MovieInformation\MovieInformation;

// Get move by title
$movie = new MovieInformation('The Matrix', array('plot'=>'full', 'tomatoes'=>'true'));

echo $movie->title . '<br>';      
echo $movie->year . '<br>';       
echo $movie->rated . '<br>';      
echo $movie->released . '<br>';   
echo $movie->runtime . '<br>';    
echo $movie->genre . '<br>';      
echo $movie->director . '<br>';   
echo $movie->actors . '<br>';     
echo $movie->plot . '<br>';       
echo $movie->language . '<br>';
echo $movie->country . '<br>';    
echo $movie->awards . '<br>';     
echo $movie->poster . '<br>';     
echo $movie->metascore . '<br>';  
echo $movie->imdbRating . '<br>'; 
echo $movie->imdbVotes . '<br>';  
echo $movie->imdbID . '<br>';
echo $movie->tomatoMeter . '<br>';
echo $movie->tomatoImage . '<br>';
echo $movie->tomatoRating . '<br>';
echo $movie->tomatoReviews . '<br>';
echo $movie->tomatoFresh . '<br>';
echo $movie->tomatoRotten . '<br>';
echo $movie->tomatoConsensus . '<br>';
echo $movie->tomatoUserMeter . '<br>';
echo $movie->tomatoUserRating . '<br>';
echo $movie->tomatoUserReviews . '<br>';
echo $movie->dvd . '<br>';
echo $movie->boxOffice . '<br>';
echo $movie->production . '<br>';
echo $movie->website;