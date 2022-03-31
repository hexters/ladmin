<?php

namespace Modules\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Ladmin\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return ladmin()->view('dashboard.index');
    }
}
