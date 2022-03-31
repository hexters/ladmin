<?php

namespace Hexters\Ladmin;

use Hexters\Ladmin\Models\LadminLoggable as ModelsLadminLoggable;

trait LadminLoggable
{


    /**
     * Loggable relations
     *
     * @return \Hexters\Ladmin\Models\LadminLoggable
     */
    public function ladmin_loggable()
    {
        return $this->morphMany(ModelsLadminLoggable::class, 'loggable');
    }

    protected static function bootLadminLoggable()
    {

        static::updated(fn ($model) => self::activity($model, 'Update'));
        static::created(fn ($model) => self::activity($model, 'Create'));
        static::deleting(fn ($model) => self::activity($model, 'Delete'));

        if (method_exists(__CLASS__, 'trashed')) {
            static::trashed(fn ($model) => self::activity($model, 'Trash'));
        }

        if (method_exists(__CLASS__, 'forceDeleted')) {
            static::forceDeleted(fn ($model) => self::activity($model, 'Force Delete'));
        }

        if (method_exists(__CLASS__, 'restored')) {
            static::restored(fn ($model) => self::activity($model, 'Restore'));
        }
    }

    /**
     * Update activity
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $method
     * @return void
     */
    protected static function activity($model, $method)
    {
        if (auth()->guard(config('ladmin.auth.guard'))->guest()) {
            return;
        }

        $user = auth()->guard(config('ladmin.auth.guard'))->user();

        $instance = ladmin()->admin();
        if (!($user instanceof $instance)) {
            return;
        }

        if (property_exists($model, 'fillableExceptActivity')) {
            $excepts = false;
            foreach ($model->fillableExceptActivity as $except) {
                if ($model->isDirty($except)) {
                    $excepts = true;
                }
            }

            if ($excepts) {
                return;
            }
        }

        $model->ladmin_loggable()->create([
            'user_id' => $user->id,
            'new_data' => $model->toArray(),
            'old_data' => $model->getOriginal(),
            'type' => $method,
        ]);
    }
}
