<?php 

use Hexters\Ladmin\Helpers\Ladmin;

if(! function_exists( 'ladmin' ) ) {
  function ladmin() {
    return new Ladmin;
  }
}