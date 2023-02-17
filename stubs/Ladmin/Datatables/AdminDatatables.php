<?php

namespace Modules\Ladmin\Datatables;

class AdminDatatables extends Datatables
{

    /**
     * Page Title
     *
     * @var String
     */
    protected $title = 'List of admin accounts';

    /**
     * Setup Query Builder
     */
    public function __construct()
    {
        $this->query = ladmin()->admin()->with('roles');
    }

    /**
     * Custom route to fetch data from Datatables
     *
     * @return String
     */
    public function ajax()
    {
        return route('ladmin.admin.index', ['datatables']);
    }

    /**
     * DataTables using Eloquent Builder.
     *
     * @return DataTableAbstract|EloquentDataTable
     */
    public function handle()
    {
        return $this->eloquent($this->query)
            ->addColumn('avatar', function ($row) {
                return "<img src=\"{$row->gravatar}\" class=\"rounded-circle img-thumbnail\" width=\"45\" alt=\"Avatar\">";
            })
            ->editColumn('roles.name', function ($row) {
                return $row->roles->pluck('name');
            })
            ->addColumn('action', function ($row) {
                return $this->action($row);
            });
    }

    public function action($data)
    {
        return ladmin()->view('admin._parts.table-action', $data);
    }

    /**
     * Table headers
     *
     * @return array
     */
    public function headers(): array
    {
        return [
            'Avatar' => ['class' => 'text-end'],
            'Name',
            'Email',
            'Roles',
            'Action',
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
            ['data' => 'avatar', 'class' => 'text-center'],
            ['data' => 'name'],
            ['data' => 'email'],
            ['data' => 'roles.name', 'orderable' => false],
            ['data' => 'action', 'class' => 'text-end', 'orderable' => false]
        ];
    }
}
