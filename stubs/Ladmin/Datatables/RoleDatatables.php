<?php

namespace Modules\Ladmin\Datatables;

use Ladmin\Engine\Models\LadminRole;

class RoleDatatables extends Datatables
{

    /**
     * Page title
     *
     * @var String
     */
    protected $title = 'List of Roles';

    /**
     * Setup query builder
     */
    public function __construct()
    {
        $this->query = LadminRole::query();
    }

    /**
     * Button create page
     *
     * @return \Illuminate\Support\Facades\Blade
     */
    public function button()
    {
        return ladmin()->view('role.create');
    }

    /**
     * DataTables using Eloquent Builder.
     *
     * @return DataTableAbstract|EloquentDataTable
     */
    public function handle()
    {
        return $this->eloquent($this->query)
            ->editColumn('gates', function ($row) {
                return count($row->gates) . ' access';
            })
            ->addColumn('admins', function ($row) {
                return $row->admins->count() . ' admin';
            })
            ->addColumn('action', function ($row) {
                return ladmin()->view('role._parts.table-action', ['role' => $row]);
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
            'Role Name',
            'Used' => ['class' => 'text-center'],
            'Permissions' => ['class' => 'text-center'],
            'Action' => ['class' => 'text-end'],
        ];
    }

    /**
     * Datatables Data column
     * Visit Doc: https://datatables.net/reference/option/columns.data#Default
     *
     * @return array
     */
    public function columns(): array
    {
        return [
            ['data' => 'name'],
            ['data' => 'admins', 'class' => 'text-center'],
            ['data' => 'gates', 'class' => 'text-center'],
            ['data' => 'action', 'class' => 'text-end', 'orderable' => false]
        ];
    }
}
