<?php

namespace App\Http\Controllers\Administrator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;
    
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function __construct() {
        $this->redirectTo = $this->redirectTo();
    }
    
    public function redirectTo() {
        return '/' . config('ladmin.prefix', 'administrator');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('ladmin::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
