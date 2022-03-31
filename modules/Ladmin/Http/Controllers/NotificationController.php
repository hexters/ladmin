<?php

namespace Modules\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Ladmin\Http\Controllers\Controller;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->has('search')) {
            $data['notifications'] =  in_array($request->state, ['all', null]) ? auth()->user()->notifications()->where(DB::raw('LOWER(data)'), 'LIKE', '%' . strtolower($request->search) . '%')->paginate(10) : auth()->user()->unreadNotifications()->where(DB::raw('LOWER(data)'), 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $data['notifications'] =  in_array($request->state, ['all', null]) ? auth()->user()->notifications()->paginate(10) : auth()->user()->unreadNotifications()->paginate(10);
        }

        $data['state'] = request()->get('state', 'all');
        return ladmin()->view('notification.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = auth()->user()->notifications()->whereId($id)->firstOrFail();
        $notification->read_at = now();
        $notification->save();

        return redirect($notification->data['link']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
