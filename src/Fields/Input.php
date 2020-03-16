<?php

namespace Hexters\Ladmin\Fields;

class Input {

  protected function options($attributes) {
    $attribute = '';
    foreach( $attributes as $attr => $val ) {
      $attribute .= $attr . '="' . $val . '" ';
    }
    return $attribute;
  }

}