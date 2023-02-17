<?php

namespace Modules\Ladmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ladmin\Engine\Models\LadminRole;

class RoleRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:50'],
        ];
    }

    /**
     * Create new role
     *
     * @return void
     */
    public function createRole()
    {

        $role = LadminRole::create(['name' => $this->name]);

        session()->flash('success', 'Role has been created and please assign roles and permissions.');

        return redirect()->route('ladmin.role.show', [$role->id, 'back' => route('ladmin.role.index')]);
    }

    /**
     * Update role
     *
     * @param \Ladmin\Engine\Models\LadminLoggable $role
     * @return void
     */
    public function updateRole(LadminRole $role)
    {

        $role->update(['name' => $this->name]);

        session()->flash('success', 'Role has been updated');

        return redirect()->back();
    }
}
