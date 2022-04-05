<?php

namespace Hexters\Ladmin\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Hexters\Ladmin\Models\LadminOption as ModelsLadminOption;
use phpDocumentor\Reflection\Types\Boolean;

trait LadminOption
{

    /**
     * Setup cache driver
     *
     * @return \Illuminate\Support\Facades\Cache
     */
    protected function cache()
    {
        return Cache::store(config('ladmin.option.cache.driver'));
    }

    /**
     * Get cache config enabled option
     *
     * @return boolean
     */
    protected function cacheEnable()
    {
        return config('ladmin.option.cache.enable');
    }

    /**
     * Convert option value
     *
     * @param String $key
     * @return array|String
     */
    protected function convertOption($key)
    {
        if ($this->cacheEnable() && $this->cache()->has($key)) {
            $value = $this->cache()->get($key);
        } else {
            $option = ModelsLadminOption::where('option_name', $key)->first();
            $value = $option->option_value ?? null;

            if($this->cacheEnable() && $value) {
                $this->cache()->forever($key, $value);
            }
        }
        
        $convert = null;
        if($value) {
            $convert = json_decode($value, true);
        }

        return is_array($convert) ? $convert : $value;
    }

    /**
     * Option exists
     *
     * @param String $key
     * @return Boolean
     */
    public function hasOption($key)
    {
        if ($this->cacheEnable()) {
            return $this->cache()->has($key) && ModelsLadminOption::where('option_name', $key)->exists() ? true : false;
        } else {
            return ModelsLadminOption::where('option_name', $key)->exists();
        }
    }

    /**
     * Get option value
     *
     * @param String $key
     * @return array|String
     */
    public function getOption($key, $default = null)
    {
        return $this->convertOption($key) ?? $default;
    }

    /**
     * Store option value
     *
     * @param String $key
     * @param array|String $value
     * @return array|String
     */
    public function setOption($key, $value)
    {

        $storeValue = is_array($value) ? json_encode($value) : $value;
        $type = is_array($value) ? 'array' : 'string';

        if ($this->cacheEnable()) {
            $this->cache()->forever($key, $storeValue);
        }

        if ($this->hasOption($key)) {
            ModelsLadminOption::where('option_name', $key)->update([
                'option_value' => $storeValue,
                'type' => $type
            ]);
        } else {
            ModelsLadminOption::create([
                'option_name' => $key,
                'option_value' => $storeValue,
                'type' => $type
            ]);
        }

        return $value;
    }

    /**
     * Delete existing option
     *
     * @param String $key
     * @return Boolean
     */
    public function deleteOption($key)
    {
        if ($this->cacheEnable()) {
            $this->cache()->forget($key);
        }

        ModelsLadminOption::where('option_name', $key)->delete();

        return true;
    }

    /**
     * Flexible option method
     *
     * @param String $method
     * @param String $key
     * @param array|String $value
     * @return array|String|Booelan
     */
    public function option($method, $key, $value = null)
    {
        switch (Str::of($method)->lower()) {
            case "has":
                return $this->hasOption($key);
                break;
            case "get":
                return $this->getOption($key);
                break;
            case "set":
                return $this->setOption($key, $value);
            case "delete":
                return $this->deleteOption($key);
                break;
            default:
                return false;
        }
    }
}
