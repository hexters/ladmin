<?php

namespace Modules\Ladmin\Datatables;

use Illuminate\Support\Facades\Blade;
use Ladmin\Engine\Models\LadminLoggable;

class UserActivityDatatables extends Datatables
{

    /**
     * Page title
     *
     * @var String
     */
    protected $title = 'List of Activities';

    /**
     * Setup query builder
     */
    public function __construct()
    {
        $this->query = LadminLoggable::with('admin');
    }

    public function button()
    {
        return ladmin()->view('activities._parts._delete');
    }

    /**
     * DataTables using Eloquent Builder.
     *
     * @return DataTableAbstract|EloquentDataTable
     */
    public function handle()
    {
        return $this->eloquent($this->query)
            ->editColumn('admin.name', function ($row) {
                return ladmin()->view('activities._parts._admin', ['data' => $row->admin])->render();
            })
            ->editColumn('type', function ($row) {
                return $row->type_badge;
            })
            ->editColumn('loggable_type', function ($row) {
                return Blade::render('<code>' . $row->loggable_type . '</code>');
            })
            ->editColumn('created_at', function ($row) {
                $date = $row->created_at->format(config('ladmin.date.format'));
                $diff = $row->created_at->diffForHumans();
                return Blade::render('<span>' . $date . '</span><br><small class="text-muted">' . $diff . '</small>');
            })
            ->addColumn('action', function ($row) {
                return ladmin()->view('activities._parts.table-action', ['data' => $row])->render();
            });
    }

    /**
     * Table headers
     *
     * @return array
     */
    public function headers(): array
    {
        return [
            'Date',
            'Method',
            'Model',
            'Admin',
            'Action' => ['class' => 'text-center'],
        ];
    }

    /**
     * Datatables Data column
     *
     * @return array
     */
    public function columns(): array
    {
        return [
            ['data' => 'created_at'],
            ['data' => 'type'],
            ['data' => 'loggable_type'],
            ['data' => 'admin.name'],
            ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
        ];
    }
}
