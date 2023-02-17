<?php

namespace Modules\Ladmin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Ladmin\Datatables\PermissionDatatables;
use Modules\Ladmin\Http\Controllers\Controller;
use Ladmin\Engine\Models\LadminRole;

class PermissionController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        ladmin()->allows(['role.assign']);

        $request->validate([
            'gates' => ['nullable', 'array']
        ]);

        $role = LadminRole::findOrFail($id);

        if ($id == 1 && !in_array('role.assign', $request->gates)) {
            session()->flash('warning', $role->name . ' need assign permission to manage all menu display');
            return redirect()->back();
        }

        
        $role->gates = $request->gates;
        $role->save();

        session()->flash('success', $role->name . ' has been assigned.');

        return redirect()->back();
    }
}
