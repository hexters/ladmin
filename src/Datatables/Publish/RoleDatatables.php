<?php 

  namespace App\DataTables;

  use App\Models\Role;
  use Hexters\Ladmin\Datatables\Datatables;
  use Hexters\Ladmin\Contracts\DataTablesInterface;

  class RoleDatatables extends Datatables implements DataTablesInterface {


    /**
     * Datatables function
     */
    public function render() {

      /**
       * Data from controller
       */
      $data = self::$data;

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

    /**
     * Datatables Option
     */
    public function options() {

      /**
       * Data from controller
       */
      $data = self::$data;

      return [
        'title' => 'Roles',
        'fields' => [ __('ID'), __('Name'), __('Action')
        ],
        'buttons' => view('vendor.ladmin.role._partials._topButton'),
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
