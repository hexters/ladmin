<?php

namespace Hexters\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Hexters\Ladmin\Helpers\ReadLog;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        ladmin()->allow('administrator.system.log.index');
        
        $data['files'] = (new ReadLog)->get_files();
        $data['file'] = request()->get('log', (new ReadLog)->default_file());
        $data['logs'] = (new ReadLog)->json($data['file']);
        
        return view('ladmin::logs.index', $data);

    }

}
