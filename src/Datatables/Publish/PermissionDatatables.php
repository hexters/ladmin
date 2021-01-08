<?php 

  namespace App\DataTables;

  use App\Models\Role;
  use Hexters\Ladmin\Datatables\Datatables;
  use Hexters\Ladmin\Contracts\DataTablesInterface;

  class PermissionDatatables extends Datatables implements DataTablesInterface {

    public function render() {
      return $this->eloquent(Role::query())
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

    public function options() {
      
      return [
        'title' => 'Select Role',
        'fields' => [
          [ 'name' => 'ID', 'class' => 'text-center'],
          [ 'name' => 'Name' ],
          [ 'name' => 'Action', 'class' => 'text-center' ]
        ],
        'buttons' => null,
        'options' => [
          'processing' => true,
          'serverSide' => true,
          'ajax' => request()->fullurl(),
          'columns' => [
              ['data' => 'id', 'class' => 'text-center'],
              ['data' => 'name'],
              ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
          ]
        ]
      ];

    }

  }