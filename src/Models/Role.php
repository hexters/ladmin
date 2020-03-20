<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;
use Hexters\Ladmin\Contracts\MasterCrud;

class Role extends Model implements MasterCrud {
        
    protected $fillable = [
        'name',
        'gates'
    ];

    protected $casts = [
        'gates' => 'array'
    ];

    /**
     * return for showing field
     *
     * @return Array
     */
    public function fields() {
        return [
            'name' => 'Name',
            'gates' => 'Gate'
        ];
    }

    /**
     * Field declaration for searcing data
     *
     * @return Array
     */
    public function search() {
        return [
            'name',
            'gates'
        ];
    }

    /**
     * Route for create new data
     *
     * @param [String] $name
     * @return String
     */
    public function createdRouteName() {
        return 'administrator.access.route.create';
    }

    /**
     * Action
     *
     * @param [Collection] $item
     * @return String
     */
    public function actions() {}
}
