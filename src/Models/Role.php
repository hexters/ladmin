<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Hexters\Ladmin\LadminLogable;

class Role extends Model {
    
    use HasFactory, LadminLogable;

    protected $fillable = [
        'name',
        'gates'
    ];

    protected $casts = [
        'gates' => 'array'
    ];
}
