<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LadminLogable extends Model {

    use HasFactory;

    protected $fillable = [
        'user_id',
        'new_data',
        'old_data',
        'logable_type',
        'logable_id',
        'type',
        'state'
    ];

    protected $casts = [
        'new_data' => 'array',
        'old_data' => 'array'
    ];

    public $colors = [
        'create' => 'success',
        'edit' => 'warning',
        'delete' => 'danger',
        'login' => 'success',
        'logout' => 'warning',
    ];

    public function user() {
        return $this->belongsTo(config('ladmin.user'), 'user_id', 'id');
    }

    public function logable() {
        return $this->morpthTo();
    }
}
