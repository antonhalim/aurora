<?php namespace Aurora\Services\MobileCommons;

use GuzzleHttp\Client;

class MobileCommonsAPI {

  protected $client;

  public function __construct()
  {
    $base_url = "https://secure.mcommons.com/api/profile";

    $client = new Client(['base_url' => $base_url]);

    $response = $this->client->post('/login');

    dd($response);

    $this->client = $client;
  }

  public function userProfile($mobile)
  {

    $response = $this->client->get('?phone_number=' . $mobile);

    return $response;
  }

}
