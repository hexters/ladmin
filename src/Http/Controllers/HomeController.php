<?php

namespace Hexters\Ladmin\Http\Controllers;

class HomeController extends Controller {
    
  public function index() {
    
    return view('ladmin::home');
  }

}
