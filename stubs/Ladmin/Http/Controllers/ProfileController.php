<?php

namespace Modules\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Response;
use Ladmin\Engine\Models\Admin;
use Modules\Ladmin\Http\Controllers\Controller;
use Modules\Ladmin\Http\Requests\ProfileRequest;
use Ramsey\Uuid\Type\Integer;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('ajax')) {
            return $this->ajaxRoute($request);
        }

        $data['user'] = auth()->user();
        $data['inspire'] = Inspiring::quote();
        return ladmin()->view('profile.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data['user'] = auth()->user();
        return ladmin()->view('profile.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        return $request->updateProfile();
    }

    /**
     * Ajax route
     *
     * @param Request $request
     * @return void
     */
    protected function ajaxRoute(Request $request)
    {
        if (method_exists(__CLASS__, $request->ajax)) {
            return $this->{$request->ajax}($request);
        }
        abort(404);
    }

    /**
     * Get total admin online
     *
     * @return Integer
     */
    protected function total_online()
    {
        return Admin::where('online_at', '>', now())->count();
    }

    /**
     * Get total admin
     *
     * @return Integer
     */
    protected function total_admin()
    {
        return Admin::count();
    }

    /**
     * Response total admin online
     *
     * @param Request $request
     * @return Response
     */
    protected function load_total_online(Request $request)
    {
        return number_format($this->total_online(), 0);
    }

    /**
     * Response percentage admin online
     *
     * @param Request $request
     * @return Response
     */
    protected function load_percenteage_online(Request $request)
    {
        $result = ($this->total_online() / $this->total_admin()) * 100;
        $formater = number_format($result, 1) . '%';
        return '<h2>' . $formater . '</h2>
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                    style="height:10px;" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: ' . $result . '%"></div>
                </div>';
    }

    /**
     * Response total admin
     *
     * @param Request $request
     * @return Response
     */
    protected function load_total_admin(Request $request)
    {
        return number_format($this->total_admin(), 0);
    }


    /**
     * Response table coworkers
     *
     * @param Request $request
     * @return Response
     */
    protected function load_table_coworkers(Request $request)
    {
        $data['roles'] = $request->user()->roles;
        return view('ladmin::profile._parts._table_coworkers', $data);
    }
}
