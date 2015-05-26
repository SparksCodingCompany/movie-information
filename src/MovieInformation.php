<?php 

namespace SparksCoding\MovieInformation;

/**
 * Movie Information Class
 *
 * A PHP wrapper for the OMDb API (http://www.omdbapi.com/)
 *
 * @version   0.1beta
 * @author    Matt Sparks <matt@sparkscoding.com>
 * @copyright 2015 Sparks Coding Company (http://sparkscoding.com)
 * @license   http://opensource.org/licenses/GPL-3.0 GPL v3
 */

class MovieInformation
{
	/**
	 * API URL
	 * @var string
	 */
	protected $apiUrl = 'http://www.omdbapi.com/';

	/**
	 * Movie Title or IMDB ID
	 * @var array
	 */
	protected $movieId;

	/**
	 * Unfiltered API results
	 * @var array
	 */
	private $unfilteredResults;

	/**
	 * Type of Entertainment
	 * @var string
	 */
	public $type;

	/**
	 * Movie Title
	 * @var string
	 */
	public $title;

	/**
	 * Movie Year
	 * @var string
	 */
	public $year;

	/**
	 * Movie Rating
	 * @var string
	 */
	public $rating;

	/**
	 * Movie Release Date
	 * @var string
	 */
	public $released;

	/**
	 * Movie Runtime
	 * @var string
	 */
	public $runtime;

	/**
	 * Movie Genre
	 * @var string
	 */
	public $genre;

	/**
	 * Movie Director(s)
	 * @var string
	 */
	public $director;

	/**
	 * Movie Writer(s)
	 * @var string
	 */
	public $writer;

	/**
	 * Movie Actors
	 * @var string
	 */
	public $actors;

	/**
	 * Movie Plot
	 * @var string
	 */
	public $plot;

	/**
	 * Movie Language
	 * @var string
	 */
	public $language;

	/**
	 * Movie Country
	 * @var string
	 */
	public $country;

	/**
	 * Movie Awards
	 * @var string
	 */
	public $awards;

	/**
	 * Movie Poster
	 * @var string
	 */
	public $poster;

	/**
	 * Movie Metascore
	 * @var string
	 */
	public $metascore;

	/**
	 * Movie IMDB Rating
	 * @var string
	 */
	public $imdbRating;

	/**
	 * Movie IMDB Votes
	 * @var string
	 */
	public $imdbVotes;

	/**
	 * Movie IMDB ID
	 * @var string
	 */
	public $imdbId;

	/**
	 * Class Constructor
	 *
	 * Make API call, parse information
	 *
	 * @param string $movieID The title or IMDB id
	 * 
	 */
	public function __construct($movieId)
	{
		// Set Movie ID
		$this->movieId = $movieId;

		// Make API request
		$this->unfilteredResults = $this->makeRequest();

		// Parse Results
		$this->parseResults();
	}

	/**
	 * Make the API URL
	 * @return string $url API url
	 */
	private function makeApiUrl()
	{

		$url = $this->apiUrl . '?';

		// Determine if we're using an IMDB ID or a movie title.
		if(preg_match('/^(tt)[A-Za-z0-9]+/', $this->movieId))
		{
			$field = 'i=';
		}
		else
		{
			$field = 't=';
		}

		$url = $url . $field . urlencode($this->movieId);

		return $url;

	}

	/**
	 * Make simple cURL request.
	 * 
	 * @return object $result The movie's information
	 */
	private function makeRequest()
	{		
		// cURL Resource
		$ch = curl_init();

		// cURL Options
		$curlOptions = [];

		// Parameters
		$params = [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $this->makeApiUrl(),
		];

		// Set Parameters
		$curlOptions = $params;

		// Set Options
		curl_setopt_array($ch, $curlOptions);

		// Execute Call
		$result = curl_exec($ch);
		
		// Close
		curl_close($ch);

		return json_decode($result);	

	}

	/**
	 * Parse API Results
	 * @return
	 */
	private function parseResults()
	{
		foreach($this->unfilteredResults as $key=>$value)
		{
			// Make key lowercase
			$key = strtolower($key);

			$this->$key = $value;
		}
	}

	/**
	 * Get Value
	 * 
	 * @param  string  $key     Requested item
	 * @param  boolean $asArray Return the results as an array
	 * @return mixed            
	 */
	public function get($key, $asArray = false)
	{
		return $asArray ? explode(',', $this->$key) : $this->$key;
	}

	/**
	 * Get All Information
	 * 
	 * @return array
	 */
	public function getAll()
	{
		return (array) $this->unfilteredResults;
	}


}