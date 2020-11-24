<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use Hexters\Ladmin\Exceptions\LadminException;
use Hexters\Ladmin\Helpers\Menu;
use App\DataTables\PermissionDatatables;

class PermissionController extends Controller {

    protected $repository;

    public function __construct(RoleRepository $repository) {
        $this->repository = $repository; 
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        ladmin()->allow('administrator.access.permission.index');
        
        return PermissionDatatables::view();
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        ladmin()->allow('administrator.access.permission.assign');

        $request->validate([
            'gates' => ['required']
        ]);

        try {
            $role = $this->repository->getModel()->findOrFail($id);
            $role->update([
                'gates' => $request->gates
            ]);
            session()->flash('success', [
                'Permission has been signed sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        ladmin()->allow('administrator.access.permission.show');

        $data['role'] = $this->repository->getModel()->findOrFail($id);
        $data['menu'] = new Menu;
        return view('vendor.ladmin.permission.show', $data);
    }

    
}
