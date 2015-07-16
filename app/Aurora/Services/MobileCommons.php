<?php namespace Aurora\Services\MobileCommons;

use GuzzleHttp\Client;

class MobileCommonsAPI {

 protected $client;

 public function __construct()
 {
  $base_url = "https://secure.mcommons.com/api/";

  $client = new \GuzzleHttp\Client([
	 'base_url' => $base_url,
	 'defaults' => array(
	 	'headers' => [
	 		'Content-Type' => 'application/json',
	 		'Accept'	=> 'application/json'
		 ],
		 'auth'		=> ['developerasst2@dosomething.org', 'summerintern!']
	 ),
	]);
  $this->client = $client;
 }

 public function userProfile($mobile)
 {
  $response = $this->client->get('profile?phone_number=' . $mobile . '&include_messages=true');

	$xml = $response->xml();
	$json = json_encode($xml);
	$array = json_decode($json, TRUE);
	return $array;
 }

}
