<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class UserRepository extends Repository implements MasterRepositoryInterface {
  
  public function __construct() {
    parent::__construct(
      app(config('ladmin.user', App\Models\User::class))
    );
  }
  
  /**
   * Update user
   *
   * @param Request $request
   * @param [Model] $user
   * @return Void
   */
  public function updateUser(Request $request, $id) {

    if(!is_null($request->pass)) {
      $request->merge([
        'password' => bcrypt($request->pass)
      ]);
    }

    $user = $this->model->findOrFail($id);
    $user->update($request->all());
    if($request->has('role_id')) {
      $user->roles()->sync($request->role_id);
    }
  }

  public function createUser(Request $request) {
    
    $request->merge([
      'password' => bcrypt($request->pass)
    ]);
    $user = $this->model->create($request->all());
    if($request->has('role_id')) {
      $user->roles()->sync($request->role_id);
    }

  }

}