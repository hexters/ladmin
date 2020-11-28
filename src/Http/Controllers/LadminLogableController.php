<?php

namespace Hexters\Ladmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hexters\Ladmin\Datatables\LadminLogableDatatables;
use Hexters\Ladmin\Models\LadminLogable;

class LadminLogableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        if(in_array(env('APP_ENV', 'local'), ['local'])) {
            session()->flash('warning', [
                'Add this trait <code>Hexters\Ladmin\LadminLogable</code> to all the Models you want to monitor'
            ]);
        }

        return LadminLogableDatatables::view();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $life = config('ladmin.log_activity_life', 7);
        $data = LadminLogable::where('created_at', '<', now()->addDays('-' . $life)->format('Y-m-d h:i:s'));
        $count = $data->count();
        $data->delete();
        
        if($count > 0) {
            session()->flash('success', [
                $count . ' has been deleted'
            ]);
        } else {
            session()->flash('success', [
                'No data available'
            ]);
        }


        return redirect()->back();
    }
}
