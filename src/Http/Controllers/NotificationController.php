<?php

namespace Hexters\Ladmin\Http\Controllers;

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

        $user = auth()->user();
        

        if(request()->has('src')) {
            $notification = $user->notifications()->where('data', 'LIKE', '%' . request()->get('src', 'src') . '%')->latest()->paginate( request()->get('per_page', 10) );
        } else {
            $notification = $user->notifications()->latest()->paginate( request()->get('per_page', 10) );
         }

        $data['notifications'] = $notification;

        return view('ladmin::notification.index', $data);
    }
        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $notification = $request->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        $url = $notification->data['link'] ?? null;
        if($url) {
            return redirect($url);
        }

        session()->flash('warning', ['Notification link not found.']);
        return redirect()->route('administrator.notification.index');
    }

    public function store(Request $request) {

        $request->user()->unreadNotifications()->update([
            'read_at' => now()
        ]);
        return redirect()->back();

    }
    
}
