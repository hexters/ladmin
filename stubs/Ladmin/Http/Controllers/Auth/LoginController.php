<?php

namespace Modules\Ladmin\Http\Controllers\Auth;

use Ladmin\Engine\Events\LadminLoginEvent;
use Ladmin\Engine\Events\LadminLogoutEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Ladmin\Http\Controllers\Controller;

class LoginController extends Controller
{

    /**
     * Login form
     *
     * @return view
     */
    public function showLoginForm()
    {
        return ladmin()->view('auth.login');
    }

    /**
     * Login attempt
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function attempt(Request $request)
    {

        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard( config('ladmin.auth.guard') )->attempt($data, $request->remember)) {
            $request->session()->regenerate();

            event(new LadminLoginEvent(auth()->guard( config('ladmin.auth.guard') )->user()));

            return redirect()->route('ladmin.index');
        }

        session()->flash('warning', [
            __('auth.failed')
        ]);

        return redirect()->back()->withInput();
    }

    /**
     * Admin Logout
     *
     * @return void
     */
    public function logout()
    {


        event(new LadminLogoutEvent(
            auth()->guard(config('ladmin.auth.guard'))->user()
        ));

        auth()->guard(config('ladmin.auth.guard'))->logout();
        return redirect()->route('ladmin.login');
    }
}
