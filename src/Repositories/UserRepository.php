<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class UserRepository extends Repository implements MasterRepositoryInterface {
  
  public function __construct(User $model) {
    parent::__construct($model);
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

    $this->model->findOrFail($id)->update($request->all());
  }

  public function createUser(Request $request) {
    
    $request->merge([
      'password' => bcrypt($request->pass)
    ]);
    $this->model->create($request->all());

  }

}