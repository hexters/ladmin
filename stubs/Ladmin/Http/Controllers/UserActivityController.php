<?php

namespace Modules\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Ladmin\Datatables\UserActivityDatatables;
use Modules\Ladmin\Http\Controllers\Controller;
use Ladmin\Engine\Models\LadminLoggable;

class UserActivityController extends Controller
{

    protected $messages = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        ladmin()->allows(['user.activity.index']);

        if (in_array(config('app.env'), ['local']) && !request()->has('draw')) {
            session()->flash('info', 'Add this trait <code>Ladmin\Engine\LadminLoggable</code> to all the Models you want to monitor');
        }

        return UserActivityDatatables::view();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        ladmin()->allows(['user.activity.show']);

        ladmin()->allows(['user.activity.show']);
        $data['data'] = LadminLoggable::whereUuid($uuid)->firstOrFail();
        return ladmin()->view('activities.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uniq)
    {
        ladmin()->allows(['user.activity.destroy']);

        $lifetime = config('ladmin.activity.delete_period', 7);
        $date = now()->addDays("-{$lifetime}")->format('Y-m-d h:i:s');

        $logs = LadminLoggable::whereDate('created_at', '<', $date);
        $total = $logs->count();
        $logs->delete();

        if ($total > 0) {
            session()->flash('success', ($total > 1 ? $total . ' activities' : $total . ' activity') . ' has been deleted.');
        } else {
            session()->flash('warning', 'No activity can be deleted!');
        }

        return redirect()->back();
    }
}
