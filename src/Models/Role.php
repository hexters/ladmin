<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    
    protected $fillable = [
        'name',
        'gates'
    ];

    protected $casts = [
        'gates' => 'array'
    ];
}
