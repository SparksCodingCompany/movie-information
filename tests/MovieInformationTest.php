<?php
require '../src/MovieInformation.php';
use SparksCoding\MovieInformation\MovieInformation as MovieInformation;

class MovieInformationTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Holds our instance.
	 * @var object
	 */
	public $movie; 

	/**
	 * __construct
	 */
	public function __construct()
	{
		$this->movie = new MovieInformation('Blade Runner', array('plot'=>'full', 'tomatoes'=>'true'));
	}

	/**
	 * Test if a $movie is an object.
	 */
	public function testThatAnObjectHasBeenCreated()
	{
		$this->assertTrue(is_object($this->movie));
	}

	/**
	 * Test for the existence of properties.
	 */
	public function testExistenceOfProperties()
	{
		$properties = array('title', 'year', 'rated', 'released', 'runtime', 'genre', 'director', 'actors', 'plot', 'language', 'country', 'awards', 'poster', 'metascore', 'imdbRating', 'imdbVotes', 'imdbID', 'tomatoMeter', 'tomatoImage', 'tomatoRating', 'tomatoReviews', 'tomatoFresh', 'tomatoRotten', 'tomatoConsensus', 'tomatoUserMeter', 'tomatoUserRating', 'tomatoUserReviews', 'dvd', 'boxOffice', 'production', 'website');

		foreach($properties as $property)
		{
			$this->assertTrue(property_exists($this->movie, $property));
		}		
	}

	/**
	 * Test that a fake property doesn't exist.
	 */
	public function testNonExistenceOfProperty()
	{
		$this->assertFalse(property_exists($this->movie, 'totallyNotAFakeProperty'));
	}

	/**
	 * Test that the 'get' method returns a value.
	 */
	public function testGetReturnsAValue()
	{
		$this->assertTrue(!empty($this->movie->get('director')));
	}

	/**
	 * That that the 'get' method returns an empty value.
	 */
	public function testGetReturnsEmptyValue()
	{
		$this->assertTrue(empty($this->movie->get('totallyRealForSerious')));
	}

	/**
	 * That that the 'get' method returns an array.
	 */
	public function testGetReturnsAnArray()
	{
		$this->assertTrue(is_array($this->movie->get('title', true)));
	}

	/**
	 * That that the 'getMultiple' method returns an array.
	 */
	public function testGetMultipleReturnsAnArray()
	{
		$this->assertTrue(is_array($this->movie->getMultiple(array('title', 'year', 'director'))));
	}

	/**
	 * That that the 'getMultiple' method returns the proper keys.
	 */
	public function testGetMultipleReturnsProperKeys()
	{
		$keys = array('title', 'year', 'director');
		$data = $this->movie->getMultiple($keys);

		foreach($keys as $key)
		{
			$this->assertTrue(array_key_exists($key, $data));
		}		
	}

	/**
	 * That that the 'getAll' method returns an array.
	 */
	public function testGetAllReturnsArray()
	{
		$this->assertTrue(is_array($this->movie->getAll()));
	}

	/**
	 * That that the 'getAll' method returns an JSON.
	 */
	public function testGetAllReturnsJson()
	{
		$all    = $this->movie->getAll(true);
		$isJson = is_string($all) && is_object(json_decode($all)) && (json_last_error() == JSON_ERROR_NONE);

		$this->assertTrue($isJson);
	}

}