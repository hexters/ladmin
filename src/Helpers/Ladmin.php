<?php 

namespace Hexters\Ladmin\Helpers;

use Exception;
use Illuminate\Support\Facades\Gate;
use Hexters\Ladmin\Models\LadminOption;
use Illuminate\Support\Facades\Cache;

class Ladmin {

  protected $cacheAlias = 'ladmin-cache-';

  /**
   * Notification eloquent
   *
   * @return Notification
   */
  public function notification() {
    return new Notification;
  }

  /**
   * This method for protect the controller
   *
   * @param [type] $gates
   * @return boolean
   */
  public function allow($gates) {
    if(Gate::denies($gates)) {
      return abort(403);
    }
  }

  /**
   * Get icon from icon directory
   *
   * @param [type] $path
   * @return String
   */
  public function icon($path) {
    $pathName = str_replace('.', '/', trim($path)) . '.svg';
    $basePath = base_path('/resources/assets/icons/' . $pathName);
    if(file_exists($basePath)) {
      return file_get_contents($basePath);
    }
    return '<i class="' . $path . '"></i>';
  }

  /**
   * Get ladmin option
   *
   * @param [string] $name
   * @return String
   */
  public function get_option($name, $default = null) {
    $value = Cache::get( $this->cacheAlias . $name);
    if(is_null($value)) {
      
      try {
        $option = LadminOption::where('option_name', $name)->first();
        if($option) {
          $value = $option->option_value;
          /**
           * Cache option
           */
          if(config('ladmin.cache_option', true)) {
            Cache::rememberForever($this->cacheAlias . $name, function() use ($value) {
              return $value;
            });
          }
        }
      } catch (Exception $e) {}

    }

    if(! is_null($value)) {
      $array = json_decode($value);
      $value = is_array($array) || is_object($array) ? $array : $value;
    }

    return is_null($value) ? $default : $value;
  }

  /**
   * Update option
   *
   * @param [string] $name
   * @param [string] $value
   * @return boolean
   */
  public function update_option($name, $value) {
    $value = is_array($value) ? json_encode($value) : $value;
    $option = LadminOption::where('option_name', $name)->first();
    if($option) {
      $option->update([
        'option_value' => $value
      ]);
    } else {
      LadminOption::create([
        'option_name' => $name,
        'option_value' => $value,
      ]);
    }

    /**
     * Cache option
     */
    if(config('ladmin.cache_option', true)) {
      Cache::forget($this->cacheAlias . $name);
      Cache::rememberForever($this->cacheAlias . $name, function() use ($value) {
        return $value;
      });
    }

    return true;
  }

  /**
   * Delete option
   *
   * @param [string] $name
   * @return boolean
   */
  public function delete_option($name) {
    $option = LadminOption::where('option_name', $name)->first();
    if($option) {
      Cache::forget($this->cacheAlias . $name);
      return $option->delete();
    }
    return false;
  }

}
