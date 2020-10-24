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
   * Data for datatables
   *
   * @return Array
   */
  public function datatablesPermission() {
    return Datatables::eloquent($this->model->whereNotNull('id'))
      ->addColumn('action', function($item) {
        return view('ladmin::table.action', [
          'show' => [
            'title' => 'Assign Permission',
            'gate' => 'administrator.access.permission.show',
            'url' => route('administrator.access.permission.show', [$item->id, 'back' => request()->fullUrl()])
          ]
        ]);
      })
      ->escapeColumns([])
      ->make(true);
  }

  /**
   * Option for datatables
   *
   * @return Array
   */
  public function datatablesOptionsPermission() {
    return [
      'title' => 'Select Role',
      'fields' => [
        [ 'name' => 'ID', 'class' => 'text-center'],
        [ 'name' => 'Name' ],
        [ 'name' => 'Action', 'class' => 'text-center' ]
      ],
      'options' => [
        'topButton' => null,
        'processing' => true,
            'serverSide' => true,
            'ajax' => route('administrator.access.permission.index'),
            'columns' => [
                ['data' => 'id', 'class' => 'text-center'],
                ['data' => 'name'],
                ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
            ]
      ]
    ];
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
    $this->model->create($request->all());

  }

}