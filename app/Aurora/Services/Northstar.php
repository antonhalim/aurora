<?php namespace Aurora\Services\Northstar;

class NorthstarAPI {

  protected $client;

  public function __construct()
  {
    $base_url = \Config::get('services.northstar.url') . ":" . \Config::get('services.northstar.port');
    $version = \Config::get('services.northstar.version');

    $client = new \GuzzleHttp\Client([
      'base_url' => [$base_url . '/{version}/', ['version' => $version]],
      'defaults' => array(
        'headers' => [
          'X-DS-Application-Id' => \Config::get('services.northstar.app_id') ,
          'X-DS-REST-API-Key' => \Config::get('services.northstar.api_key'),
          'Content-Type' => 'application/json',
          'Accept' => 'application/json'
          ]
        ),
    ]);
    $this->client = $client;
  }

  /**
   * Sends a post request to login the user.
   */
  public function login($input)
  {
    $request = $this->client->post('login', [
      'body' => json_encode($input)
      ]);

    return $request->json();
  }
}

