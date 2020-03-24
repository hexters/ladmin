<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Hexters\Ladmin\Helpers\ReadLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if(Gate::denies('administrator.system.log.index')) abort(403);
        $data['logs'] = (new ReadLog)->handle();
        return view('ladmin::logs.index', $data);

    }

}
