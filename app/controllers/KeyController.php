<?php

class KeyController extends \BaseController {

   public function __construct() {
      $this->beforeFilter('auth');
      $this->beforeFilter('role:admin');
    }
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    try {
      // Attempt to fetch all users.
      $northstar = new Aurora\Services\Northstar\NorthstarAPI;
      $keys = $northstar->getAllApiKeys();
      return View::make('keys.index')->with(compact('keys'));

    } catch (Exception $e) {
      return View::make('keys.index')->with('flash_message', ['class' => 'alert alert-warning', 'text' => 'Looks like there is something wrong with the connection!']);
    }
  }

  public function create()
  {
    return View::make('keys.create');
  }

  public function store()
  {
    try {
      $input = Input::all();
      // Make request to create new key.
      $northstar = new Aurora\Services\Northstar\NorthstarAPI;
      $key = $northstar->createNewApiKey($input);
      // return to index page with new info.
      return Redirect::route('keys.index')->with('flash_message', ['class' => 'alert alert-success', 'text' => 'Cool, new app added!']);

    } catch (Exception $e) {
      return Redirect::route('keys.index')->with('flash_message', ['class' => 'alert alert-warning', 'text' => 'Looks like there is something wrong with the connection!']);
    }
  }


}
