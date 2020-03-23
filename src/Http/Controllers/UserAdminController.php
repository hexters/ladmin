<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;
use Hexters\Ladmin\Exceptions\LadminException;

class UserAdminController extends Controller {

    protected $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository; 
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if(Gate::denies('administrator.account.admin.index')) abort(403);
        if($request->ajax()) {
            return $this->repository->datatables();
        }
        return view('vendor.ladmin.user.index', $this->repository->datatablesOptions());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.ladmin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'pass' => ['required']
        ]);

        try {
            $this->repository->createUser($request, $id);
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
    public function show($id)
    {
        return redirect()->route('administrator.account.admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
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
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email']
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
