<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LadminNotification extends Model {

    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'image_link',
        'description',
        'gates',
        'read_at'
    ];

    protected $dates = ['read_at'];

    protected $casts = [
        'gates' => 'array'
    ];
}
