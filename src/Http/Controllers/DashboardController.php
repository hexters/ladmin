<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index() {

    return view('vendor.ladmin.dashboard.index');
  }

}
