<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {
  
    /**
     * Display a detail of the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ladmin::profile.index');
    }
    
    /**
     * Store a update profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email']
        ]);

        try {
            
            if(!is_null($request->pass)) {
                $request->merge([
                    'password' => bcrypt($request->pass)
                ]);
            }
            
            auth()->user()->update($request->all());
            session()->flash('success', [
                'Profile has been created sucessfully'
            ]);
            return redirect()->back();
        } catch (LadminException $e) {
            return redirect()->back()->withErrors([
                $e->getMessage()
            ]);
        }
    }
}
