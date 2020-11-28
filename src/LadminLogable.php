<?php

namespace Hexters\Ladmin;
use Hexters\Ladmin\Models\LadminLogable as LadminLogableModel;

trait LadminLogable {

  public function ladmin_logable() {
    return $this->morphMany(LadminLogableModel::class, 'logable');
  }

  public static function createLog($model, $event) {
    
    if(auth()->guard(config('ladmin.auth.guard'))->guest()){
      return;
    }

    $user = auth()->guard(config('ladmin.auth.guard'))->user();

    $instance = app( config('ladmin.user') );
    if(!($user instanceof  $instance )) {
      return;
    }
    
    $model->ladmin_logable()->create([
      'user_id' => $user->id,
      'type' => $event,
      'old_data' => $model->getOriginal(),
      'new_data' => $model
    ]);

  }


  protected static function bootLadminLogable() {
    
    self::created(function($model) {
      self::createLog($model, 'create');
    });    

    self::updated(function($model) {
      self::createLog($model, 'edit');
    });    

    self::deleted(function($model) {
      self::createLog($model, 'delete');
    });
    
  }
}