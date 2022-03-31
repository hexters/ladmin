<?php

namespace Hexters\Ladmin\Models;

use Hexters\Ladmin\UuidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class LadminLoggable extends Model
{
    use HasFactory, UuidGenerator;

    protected $fillable = [
        'uuid',
        'user_id',
        'loggable_type',
        'loggable_id',
        'new_data',
        'old_data',
        'type',
        'state',
    ];

    protected $casts = [
        'new_data' => 'array',
        'old_data' => 'array',
    ];

    public function getTypeBadgeAttribute()
    {
        $colors = [
            'create' => 'bg-secondary',
            'update' => 'bg-success',
            'login' => 'bg-info',
            'logout' => 'bg-warning',
            'delete' => 'bg-danger',
            'trash' => 'bg-warning',
            'force delete' => 'bg-danger',
            'restore' => 'bg-info',
            'reset-password' => 'bg-danger',
        ];

        return Blade::render('<span class="badge ' . ($colors[strtolower($this->type)] ?? 'primary') . '">' . ($this->type) . '</span>');
    }

    public function admin()
    {
        return $this->belongsTo(config('ladmin.user'), 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(config('ladmin.user'), 'user_id', 'id');
    }

    public function loggable()
    {
        return $this->morpthTo();
    }
}
