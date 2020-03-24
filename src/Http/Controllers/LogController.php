<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Hexters\Ladmin\Helpers\ReadLog;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['logs'] = (new ReadLog)->handle();
        return view('ladmin::logs.index', $data);

    }

}
