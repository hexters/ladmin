<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;
use Hexters\Ladmin\Exceptions\LadminException;
use App\Models\Role;
use App\DataTables\UserDatatables;

class UserAdminController extends Controller {

    protected $repository;
    protected $datatables;

    public function __construct(UserRepository $repository, UserDatatables $datatables) {
        $this->repository = $repository; 
        $this->datatables = $datatables; 
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if(Gate::denies('administrator.account.admin.index')) abort(403);
        if($request->ajax()) {
            return $this->datatables->render();
        }
        return view('ladmin::ladmin.index', $this->datatables->options());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(Gate::denies('administrator.account.admin.create')) abort(403);
        $data['roles'] = Role::all();
        return view('vendor.ladmin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Gate::denies('administrator.account.admin.create')) abort(403);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'pass' => ['required'],
            'role_id' => ['required']
        ]);

        try {
            $this->repository->createUser($request);
            session()->flash('success', [
                'User has been created sucessfully'
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
        return redirect()->route('administrator.account.admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(Gate::denies('administrator.account.admin.update')) abort(403);
        $data['roles'] = Role::all();
        $data['user'] = $this->repository->getModel()->findOrFail($id);
        return view('vendor.ladmin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if(Gate::denies('administrator.account.admin.update')) abort(403);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'role_id' => ['required']    
        ]);
        try {
            $this->repository->updateUser($request, $id);
            session()->flash('success', [
                'Update has been sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if(Gate::denies('administrator.account.admin.destroy')) abort(403);
        
        try {
            $this->repository->getModel()->findOrFail($id)->delete();
            session()->flash('success', [
                'Delete has been sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }
}
