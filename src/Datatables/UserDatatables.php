<?php 

  namespace App\DataTables;

  use Yajra\DataTables\Datatables;
  use Hexters\Ladmin\Contracts\DataTablesInterface;

  class UserDatatables extends Datatables implements DataTablesInterface {

    public function render() {
      return $this->eloquent(
          app(config('ladmin.user', App\Models\User::class))->with(['roles'])
        )
        ->editColumn('roles.name', function($item) {
          return $item->roles->pluck('name');
        })
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

    public function options() {

      return [
        'title' => 'User Admin',
        'fields' => [
          [ 'name' => 'ID', 'class' => 'text-center'],
          [ 'name' => 'Name' ],
          [ 'name' => 'Email' ],
          [ 'name' => 'Role' ],
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
              ['data' => 'roles.name', 'orderable' => false],
              ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
          ]
        ]
      ];

    }

  }