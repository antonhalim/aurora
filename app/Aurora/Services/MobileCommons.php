<?php namespace Aurora\Services\MobileCommons;

use GuzzleHttp\Client;
use Response;

class MobileCommonsAPI {

  protected $client;

  public function __construct()
  {
    $base_url = "https://secure.mcommons.com/api/profile";

   $client = new \GuzzleHttp\Client([
      'base_url' => $base_url,
      'defaults' => array(
        'auth' => ['developerasst3@dosomething.org', 'zanzibar', 'Basic']
        ),
    ]);

    $this->client = $client;
  }

  public function userProfile($mobile)
  {

    $response = $this->client->get('?phone_number=' . $mobile . '&include_messages=true');

    $xml = $response->xml();

    $json = json_encode($xml);

    $array = json_decode($json, TRUE);

    return $array['profile'];
  }

  public function userMessages($mobile)
  {

    $response = $this->client->get('?phone_number=' . $mobile . '&include_messages=true');

    $xml = $response->xml();

    $json = json_encode($xml);

    $array = json_decode($json, TRUE);

    return $array['profile']['messages']['message'];
  }

}
