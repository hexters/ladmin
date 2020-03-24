<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;

class LadminNotification extends Model {

    protected $fillable = [
        'title',
        'link',
        'image_link',
        'description',
        'read_at'
    ];

    protected $dates = ['read_at'];
}
