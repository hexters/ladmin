<?php

namespace Modules\Ladmin\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'email' => ['required', Rule::unique(ladmin()->getAdminTable(), 'email'), 'email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'roles' => ['required', 'array']
        ];

        if ($this->id) {
            $roles['email'] = ['required', Rule::unique(ladmin()->getAdminTable(), 'email')->ignore($this->id), 'email'];
            $roles['password'] = ['nullable', 'confirmed', 'min:6'];
        }
        
        return $roles;
    }

    /**
     * Create new admin
     *
     * @return void
     */
    public function adminCreate() {
        
        $admin = ladmin()->admin()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $admin->roles()->sync($this->roles);

        
        session()->flash('success', $this->name . ' has been created!');

        return redirect()->route('ladmin.admin.edit', $admin->id);

    }

    /**
     * Update profile
     *
     * @param [type] $admin
     * @return void
     */
    public function updateAdmin($admin)
    {

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if(! is_null($this->password)) {
            $data['password'] = Hash::make($this->password);
        }
        
        $admin->update($data);
        $admin->roles()->sync($this->roles);

        session()->flash('success', 'Updated has been successfully!');

        return redirect()->back();

    }
}
