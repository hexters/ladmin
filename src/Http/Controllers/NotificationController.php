<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller {
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(!config('ladmin.notification')) {
            return abort(404);
        }

        $data['notifications'] = app(config('ladmin.user', App\Models\User::class))
            ->ladmin_notifications->latest('id')
            ->limit(config('ladmin.notification_limit', 100))
            ->get();

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
        return app(config('ladmin.user', App\Models\User::class))->makeReadedLadminNotification($id);
    }
    
}
