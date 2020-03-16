<?php

namespace Hexters\Ladmin\Fields;

class TextInput extends Input {
  
  public function render($name, $value, $addon, $attributes) {
    $attr = $this->options($attributes);
    return view('ladmin::fields.text_input', compact(['name', 'value', 'addon', 'attr']));
  }

}