<?php

namespace Modules\Ladmin\Datatables;

use Ladmin\Engine\Models\LadminRole;
use Hexters\Ladmin\Datatables as BaseDatatables;

class Datatables extends BaseDatatables
{
    
    /**
     * DataTables using Eloquent Builder.
     *
     * @return DataTableAbstract|EloquentDataTable
     */
    public function handle()
    {
        //
    }
    
    /**
     * Table headers
     *
     * @return array
     */
    public function headers(): array
    {
        return [
            //
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
            //
        ];
    }
}
