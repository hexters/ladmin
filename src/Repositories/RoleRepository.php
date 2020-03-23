<?php

namespace App\Repositories;

use Hexters\Ladmin\Models\Role;
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
  public function datatables() {
    return Datatables::eloquent($this->model->whereNotNull('id'))
      ->addColumn('action', function($item) {
        return view('ladmin::table.action', [
          'show' => null,
          'edit' => [
            'gate' => 'administrator.access.role.update',
            'url' => route('administrator.access.role.edit', [$item->id, 'back' => request()->fullUrl()])
          ],
          'destroy' => [
            'gate' => 'administrator.access.role.destroy',
            'url' => route('administrator.access.role.destroy', [$item->id, 'back' => request()->fullUrl()]),
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
  public function datatablesOptions() {
    return [
      'fields' => [
        [ 'name' => 'ID', 'class' => 'text-center'],
        [ 'name' => 'Name' ],
        [ 'name' => 'Action', 'class' => 'text-center' ]
      ],
      'options' => [
        'topButton' => view('vendor.ladmin.role._partials._topButton'),
        'processing' => true,
            'serverSide' => true,
            'ajax' => route('administrator.access.role.index'),
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