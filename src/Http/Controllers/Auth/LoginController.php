<?php

namespace App\Http\Controllers\Administrator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Facades\ {
    Hexters\Ladmin\Fields\EmailInput,
    Hexters\Ladmin\Fields\PasswordInput,
};
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['forms'] = [
            [EmailInput::render('email', null, '<i class="fas fa-envelope"></i>', [ 'placeholder' => 'Email Address' ])],
            [PasswordInput::render('password', null, '<i class="fas fa-lock"></i>', ['placeholder' => 'Password'])]
        ];
        return view('ladmin::auth.login', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if (Auth::guard(config('ladmin.auth.guard', 'web'))->attempt($credentials, $request->remember)) {
            return redirect()->route('administrator.index');
        }

        return redirect()
            ->back()
            ->withErrors(['Login failed. Please recheck the username and password and try again.']);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
