<?php

namespace Modules\Ladmin\Http\Controllers;

use Modules\Ladmin\Datatables\AdminDatatables;
use Modules\Ladmin\Http\Controllers\Controller;
use Modules\Ladmin\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        ladmin()->allows(['ladmin.admin.index']);
        /**
         * Sometimes we need more than one table on a page. 
         * You can also create custom routes for rendering data from datatables. 
         * Ladmin uses the index route as a simple example.
         * 
         * Look at the \Modules\Ladmin\Datatables\AdminDatatables file in the ajax method
         */
        if( request()->has('datatables') ) {
            return AdminDatatables::renderData();
        }

        return ladmin()->view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ladmin()->allows(['ladmin.admin.create']);

        return ladmin()->view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        ladmin()->allows(['ladmin.admin.create']);
        
        return $request->adminCreate();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ladmin()->allows(['ladmin.admin.update']);

        $data['admin'] = ladmin()->admin()->findOrFail($id);
        return ladmin()->view('admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        ladmin()->allows(['ladmin.admin.update']);
        
        return $request->updateAdmin(
            ladmin()->admin()->findOrFail($id)
        );

    }
    
}
