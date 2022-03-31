<?php

namespace Modules\Ladmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roles = [
            'name' => ['required', 'max:30'],
            'password' => ['nullable', 'confirmed']
        ];

        return $roles;
    }

    /**
     * Update profile
     *
     * @return void
     */
    public function updateProfile()
    {

        $data['name'] = $this->name;
        if ($this->has('password')) {
            $data['password'] = Hash::make($this->password);
        }
        auth()->user()->update($data);

        session()->flash('success', 'Profile has been updated!');

        return redirect()->back();
    }
}
