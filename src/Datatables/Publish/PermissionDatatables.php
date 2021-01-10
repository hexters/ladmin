<?php 

  namespace App\DataTables;

  use App\Models\Role;
  use Hexters\Ladmin\Datatables\Datatables;
  use Hexters\Ladmin\Contracts\DataTablesInterface;

  class PermissionDatatables extends Datatables implements DataTablesInterface {
    
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
     * Datatables Option
     */
    public function options() {
      
      /**
       * Data from controller
       */
      $data = self::$data;

      return [
        'title' => 'Select Role',
        'fields' => [ __('ID'), __('Name'), __('Action')],
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