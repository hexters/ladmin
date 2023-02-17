<?php

namespace Modules\Ladmin\Http\Controllers\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Ladmin\Engine\Events\LadminResetPasswordEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    public function showResetForm(Request $request, $token = null)
    {
        return ladmin()->view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    /**
     * Update new password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function reset(Request $request)
    {

        $data = $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $response = Password::broker(config('ladmin.auth.broker'))->reset($this->credentials($request), fn ($user, $password)  => $this->resetPassword($user, $password));

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('ladmin.index')->with('success', [__($response)])
            : redirect()->back()->with('warning', [__($response)]);
    }


    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        );
    }

    /**
     * Save new password
     *
     * @param \Illuminate\Foundation\Auth\User $user
     * @param String $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        event(new LadminResetPasswordEvent($user));

        Auth::guard(config('ladmin.auth.guard'))->login($user);
    }
}
