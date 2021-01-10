<?php 

  namespace Hexters\Ladmin\Datatables;

  use Hexters\Ladmin\Models\LadminLogable;
  use Hexters\Ladmin\Datatables\Datatables;
  use Hexters\Ladmin\Contracts\DataTablesInterface;

  class LadminLogableDatatables extends Datatables implements DataTablesInterface {

    public function render() {
      return $this->eloquent(LadminLogable::with('user'))
      ->editColumn('logable_type', function($item) {
          return $item->logable_type;
        })
        ->editColumn('type', function($item) {
          return '<span class="badge badge-' . ($item->colors[$item->type] ?? 'warning') . '">' . ucwords($item->type) . '</span>';
        })
      ->editColumn('created_at', function($item) {
        return $item->created_at->format('d/m/y H:i') . ' - ' . $item->created_at->diffForHumans();
      })
      ->editColumn('user.name', function($item) {
          return "<strong class=\"m-0 p-0\">{$item->user->name}</strong><br><small class=\"text-muted\">{$item->user->email}</small>";
        })
        ->addColumn('action', function($item){
          return view('ladmin::logable._table_buttons', ['item' => $item]);
        })
        ->escapeColumns([])
        ->make(true);
    }

    public function options() {
      
      return [
        'title' => 'List Of Activity',
        'fields' => [ __('Date'), __('Type'), __('Model'), __('User'), __('Action')],
        'buttons' => view('ladmin::logable._button_delete'),
        'options' => [
          'processing' => true,
          'serverSide' => true,
          "order" => [[0, "desc"]],
          'ajax' => request()->fullurl(),
          'columns' => [
            ['data' => 'created_at'],
            ['data' => 'type', 'class' => 'text-center'],
            ['data' => 'logable_type'],
            ['data' => 'user.name'],
            ['data' => 'action', 'class' => 'text-right'],
          ]
        ]
      ];

    }

  }