<?php 

  namespace App\DataTables;

  use App\Models\Role;
  use Yajra\DataTables\Datatables;
  use Hexters\Ladmin\Contracts\DataTablesInterface;

  class RoleDatatables extends Datatables implements DataTablesInterface {

    public function render() {
      return $this->eloquent(Role::query())
        ->addColumn('action', function($item) {
          return view('ladmin::table.action', [
            'show' => null,
            'edit' => [
              'gate' => 'administrator.access.role.update',
              'url' => route('administrator.access.role.edit', [$item->id, 'back' => request()->fullUrl()])
            ],
            'destroy' => ($item->id > 1) ? [
              'gate' => 'administrator.access.role.destroy',
              'url' => route('administrator.access.role.destroy', [$item->id, 'back' => request()->fullUrl()]),
            ] : null
          ]);
        })
        ->escapeColumns([])
        ->make(true);
    }

    public function options() {

      return [
        'title' => 'Roles',
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

  }
