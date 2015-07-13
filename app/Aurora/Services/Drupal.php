<?php namespace Aurora\Services\Drupal;

use GuzzleHttp\Client;

class DrupalAPI {

  protected $client;

  public function __construct()
  {
    $base_url = \Config::get('services.drupal.url');

    $client = new Client(['base_url' => $base_url]);

    $this->client = $client;
  }


  public function getCampaign($id)
  {

    $response = $this->client->get('campaigns/' . $id);

    return $response->json()['data'];
  }

  public function getReportbacks($id)
  {
    $response = $this->client->get('reportbacks/' . $id . '.json');

    return $response->json()['data']['reportback_items']['data'];
  }

  public function getReportbackItems($id)
  {
    $response = $this->client->get('reportback-items/' . $id . '.json');
    
    return $response->json()['data'];
  }

}