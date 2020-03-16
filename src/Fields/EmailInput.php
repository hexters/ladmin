<?php

namespace Hexters\Ladmin\Fields;

class EmailInput extends Input {
  
  public function render($name, $value, $addon, $attributes) {
    $attr = $this->options($attributes);
    return view('ladmin::fields.email_input', compact(['name', 'value', 'addon', 'attr']));
  }

}