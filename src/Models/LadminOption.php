<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LadminOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_name',
        'option_value',
        'type'
    ];
}
