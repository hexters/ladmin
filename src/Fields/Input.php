<?php

namespace Hexters\Ladmin\Fields;

use Illuminate\Support\Facades\Facade;

class Input extends Facade {

  protected function options($attributes) {
    $attribute = '';
    foreach( $attributes as $attr => $val ) {
      $attribute .= $attr . '="' . $val . '" ';
    }
    return $attribute;
  }

}