<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['notifications'] = app(config('ladmin.auth.user', App\User::class))->ladmin_notification_unread;
        return view('ladmin::notification.index', $data);
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return app(config('ladmin.auth.user', App\User::class))->makeReadedLadminNotification($id);
    }
    
}
