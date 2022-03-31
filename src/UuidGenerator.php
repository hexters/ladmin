<?php

namespace Hexters\Ladmin;

use Illuminate\Support\Str;

trait UuidGenerator
{

    protected static function bootUuidGenerator()
    {
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
