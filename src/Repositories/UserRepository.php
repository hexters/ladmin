<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use Hexters\Ladmin\Contracts\MasterRepositoryInterface;

class UserRepository extends Repository implements MasterRepositoryInterface {
  
  public function __construct(User $model) {
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
            'gate' => 'administrator.account.admin.update',
            'url' => route('administrator.account.admin.edit', [$item->id, 'back' => request()->fullUrl()])
          ],
          'destroy' => [
            'gate' => 'administrator.account.admin.destroy',
            'url' => route('administrator.account.admin.destroy', [$item->id, 'back' => request()->fullUrl()]),
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
        [ 'name' => 'Email' ],
        [ 'name' => 'Action', 'class' => 'text-center' ]
      ],
      'options' => [
        'topButton' => view('vendor.ladmin.user._partials._topButton'),
        'processing' => true,
            'serverSide' => true,
            'ajax' => route('administrator.account.admin.index'),
            'columns' => [
                ['data' => 'id', 'class' => 'text-center'],
                ['data' => 'name'],
                ['data' => 'email'],
                ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
            ]
      ]
    ];
  }

  /**
   * Update user
   *
   * @param Request $request
   * @param [Model] $user
   * @return Void
   */
  public function updateUser(Request $request, $id) {

    if($request->has('pass')) {
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