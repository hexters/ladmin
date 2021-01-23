<?php

namespace App\Http\Controllers\Administrator\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller {
    

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm() {
        return view('ladmin::auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request) {
        $this->validateEmail($request);
    
        $model = app(config('ladmin.user'));
        
        $admin = $model->whereEmail($this->credentials($request))->first();
        
        if($admin) {

            if (app('auth.password.broker')->getRepository()->recentlyCreatedToken($admin)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'email' => __('passwords.throttled')
                    ]);
            }

            $response = $admin->sendPasswordResetNotification(
                app('auth.password.broker')->createToken($admin)
            );
            
            session()->flash('success', [
                __('passwords.sent')
            ]);
            
            return redirect()->back();
            
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'email' => __('passwords.user')
            ]);
        
    }
    
    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    public function broker() {
        return Password::broker(config('ladmin.auth.broker', 'users'));
    }
}
