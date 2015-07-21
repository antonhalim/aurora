<?php namespace Aurora;

class APIUser {

  protected $data;

  function __construct($data, DrupalAPI $drupal, NorthstarAPI $northstar, MobileCommonsAPI $mobileCommons)
  {
    $this->data = $data;

    $this->messages = App::make('Aurora\Services\MobileCommons\MobileCommonsAPI')->getMessages();
  }

  function getData() {
    return $data;
  }

  function getCampaigns() {
    foreach($this->data['campaigns'] as $campaign){
      if (!empty($campaign['drupal_id'])) {
        array_push($campaigns, $this->drupal->getCampaign($campaign['drupal_id']));
        if (!empty($campaign['reportback_id'])) {
          $user->getReportback($campaign['reportback_id'], $reportbacks);
        }
      }
    }
  }

  function getSmsProfile()
  {
    return $this->mobileCommons->userProfile($user['mobile']);
  }

  function getSmsMessages()
  {
    return $this->mobileCommons->userMessages($user['mobile']);
  }

  function isAdmin() {
    return AuroraUser::where('_id', $this->id)->first();
  }

}
