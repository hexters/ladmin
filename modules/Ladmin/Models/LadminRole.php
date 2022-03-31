<?php

namespace Modules\Ladmin\Models;

use Hexters\Ladmin\LadminLoggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LadminRole extends Model
{
    use HasFactory, LadminLoggable;

    protected $fillable = [
        'name',
        'gates',
    ];

    protected $casts = [
        'gates' => 'array'
    ];

    public function admins()
    {
        return $this->belongsToMany(config('ladmin.user'), 'ladmin_role_user', 'role_id', 'user_id', 'id', 'id');
    }
}
