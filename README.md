# Movie Information PHP Class

A Simple PHP Wrapper for the OMDb API (http://www.omdbapi.com/)

## Usage

```php
// Include the Class
require 'MovieInformation.php';

// Namespace
use SparksCoding\MovieInformation\MovieInformation;

// Get move by title
$movie = new MovieInformation('The Matrix', array('plot'=>'full', 'tomatoes'=>'true'));

echo $movie->title;      // The Matrix
echo $movie->year;       // 1999
echo $movie->rated;      // R
echo $movie->released;   // 31 Mar 1999
echo $movie->runtime;    // 136 min
echo $movie->genre;      // Action, Sci-Fi
echo $movie->director;   // Andy Wachowski, Lana Wachowski
echo $movie->actors;     // Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving
echo $movie->plot;       // A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.
echo $movie->language;   // English
echo $movie->country;    // USA, Australia
echo $movie->awards;     // Won 4 Oscars. Another 34 wins & 39 nominations.
echo $movie->poster;     // http://ia.media-imdb.com/images/M/MV5BMTkxNDYxOTA4M15BMl5BanBnXkFtZTgwNTk0NzQxMTE@._V1_SX300.jpg
echo $movie->metascore;  // 73
echo $movie->imdbRating; // 8.7
echo $movie->imdbVotes;  // 1023621
echo $movie->imdbID;     // tt0133093

// Additional Information Returned when 'tomatoes' is set to true

echo $movie->tomatoMeter;        // RT Meter
echo $movie->tomatoImage;        // RT Image
echo $movie->tomatoRating;       // RT Rating
echo $movie->tomatoReviews;      // Number of RT Reviews
echo $movie->tomatoFresh;        // Number of RT Fresh Reviews
echo $movie->tomatoRotten;       // Number of RT Rotten Reviews
echo $movie->tomatoConsensus;    // RT Consensus
echo $movie->tomatoUserMeter;    // RT User Meter
echo $movie->tomatoUserRating;   // RT User Rating
echo $movie->tomatoUserReviews;  // Number of RT User Reviews
echo $movie->dvd;                // DVD Release Date
echo $movie->boxOffice;          // Box Office
echo $movie->production;         // Production Company
echo $movie->website;            // Movie Website

// Get movie by IMDB ID
$movie = new MovieInformation('tt0133093');

echo $movie->title; // The Matrix
```

## Options

| Option   | Values       | Default | Description                                        |
| ---------|--------------|---------|--------------------------------------------------- |
| plot     | short, full  | short   | Return short or full movie plot                    |
| tomatoes | true, false  | false   | Return additional information from Rotten Tomatoes |

## Methods

### `get($key, $asArray)`

Get the value of specified key. Optionally return the value as an array.

```php
// As String
$actors = $movie->get('actors'); 

echo $actors // Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving

// As Array
$actors = $movie->get('actors', true);

print_r($actors); // Array ( [0] => Keanu Reeves [1] => Laurence Fishburne [2] => Carrie-Anne Moss [3] => Hugo Weaving ) 
```
### `getMultiple(array('title', 'year'))`

Get multiple values returned in an array.

```php
$multiple = $movie->getMultiple(array('title', 'year', 'genre', 'dvd'));

print_r($multiple);

// Array
// (
//     [title] => The Matrix
//     [year] => 1999
//     [genre] => Action, Sci-Fi
//     [dvd] => 21 Sep 1999
// )
```

### `getAll($asJson)`

Get all the movie's information as an array or JSON.

```php
$all = $movie->getAll();

print_r($all);

// Array
// (
//     [title] => The Matrix
//     [year] => 1999
//     [rated] => R
//     [released] => 31 Mar 1999
//     [runtime] => 136 min
//     [genre] => Action, Sci-Fi
//     [director] => Andy Wachowski, Lana Wachowski
//     [writer] => Andy Wachowski, Lana Wachowski
//     [actors] => Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving
//     [plot] => A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.
//     [language] => English
//     [country] => USA, Australia
//     [awards] => Won 4 Oscars. Another 34 wins & 40 nominations.
//     [poster] => http://ia.media-imdb.com/images/M/MV5BMTkxNDYxOTA4M15BMl5BanBnXkFtZTgwNTk0NzQxMTE@._V1_SX300.jpg
//     [metascore] => 73
//     [imdbRating] => 8.7
//     [imdbVotes] => 1,037,112
//     [imdbID] => tt0133093
//     [type] => movie
//     [tomatoMeter] => 87
//     [tomatoImage] => certified
//     [tomatoRating] => 7.6
//     [tomatoReviews] => 139
//     [tomatoFresh] => 121
//     [tomatoRotten] => 18
//     [tomatoConsensus] => Thanks to the Wachowskis' imaginative vision, The Matrix is a smartly crafted combination of spectacular action and groundbreaking special effects.
//     [tomatoUserMeter] => 85
//     [tomatoUserRating] => 3.6
//     [tomatoUserReviews] => 33317892
//     [dvd] => 21 Sep 1999
//     [boxOffice] => N/A
//     [production] => Warner Bros. Pictures
//     [website] => http://www.whatisthematrix.com
//     [response] => True
// )

// As JSON
$json = $movie->getAll(true);

echo $json;

// {"title":"The Matrix","year":"1999","rated":"R","released":"31 Mar 1999","runtime":"136 min","genre":"Action, Sci-Fi","director":"Andy Wachowski, Lana Wachowski","writer":"Andy Wachowski, Lana Wachowski","actors":"Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving","plot":"A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.","language":"English","country":"USA, Australia","awards":"Won 4 Oscars. Another 34 wins & 40 nominations.","poster":"http:\/\/ia.media-imdb.com\/images\/M\/MV5BMTkxNDYxOTA4M15BMl5BanBnXkFtZTgwNTk0NzQxMTE@._V1_SX300.jpg","metascore":"73","imdbRating":"8.7","imdbVotes":"1,037,112","imdbID":"tt0133093","type":"movie","tomatoMeter":"87","tomatoImage":"certified","tomatoRating":"7.6","tomatoReviews":"139","tomatoFresh":"121","tomatoRotten":"18","tomatoConsensus":"Thanks to the Wachowskis' imaginative vision, The Matrix is a smartly crafted combination of spectacular action and groundbreaking special effects.","tomatoUserMeter":"85","tomatoUserRating":"3.6","tomatoUserReviews":"33317892","dvd":"21 Sep 1999","boxOffice":"N\/A","production":"Warner Bros. Pictures","website":"http:\/\/www.whatisthematrix.com","response":"True"}

```

## To Do

This is a work in progress. More robust options are on the way.
