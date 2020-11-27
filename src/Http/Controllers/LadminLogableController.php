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
        
        return LadminLogableDatatables::view();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id) {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        $data = LadminLogable::where('created_at', '<', now()->addDays('-7')->format('Y-m-d h:i:s'));
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
