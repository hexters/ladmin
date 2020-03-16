<?php

namespace Hexters\Ladmin\Fields;

class EmailInput {
  
  public function render($name, $value, $addon, $attributes) {
    $attr = $this->options($attributes);
    return view('ladmin::fields.email_input', compact(['name', 'value', 'addon', 'attr']));
  }

  protected function options($attributes) {
    $attribute = '';
    foreach( $attributes as $attr => $val ) {
      $attribute .= "{$attr}=\"{$val}\" ";
    }
    return $attribute;
  }

}