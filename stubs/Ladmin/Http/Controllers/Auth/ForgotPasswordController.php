<?php

namespace Modules\Ladmin\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{


    public function showLinkRequestForm()
    {
        return ladmin()->view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->validate([
            'email' => ['required', 'email']
        ]);

        $model = ladmin()->admin();

        $admin = $model->whereEmail($email)->first();

        if ($admin) {

            if (app('auth.password.broker')->getRepository()->recentlyCreatedToken($admin)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'email' => __('passwords.throttled')
                    ]);
            }

            $admin->sendPasswordResetNotification(
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
}
