<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class RoleRepository extends Repository implements MasterRepositoryInterface {
  
  public function __construct(Role $model) {
    parent::__construct($model);
  }
    
  /**
   * Update Role
   *
   * @param Request $request
   * @param [Model] $role
   * @return Void
   */
  public function updateRole(Request $request, $id) {
    $this->model->findOrFail($id)->update($request->all());
  }

  /**
   * Create New Role
   *
   * @param Request $request
   * @return void
   */
  public function createRole(Request $request) {
    $this->model->create(array_merge($request->all(), ['gates' => []]));
  }

}