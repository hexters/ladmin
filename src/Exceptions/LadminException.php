<?php

namespace Hexters\Ladmin\Exceptions;

use Exception;
use Log;

class LadminException extends Exception {
    
    protected $errorMessage;
    public function __construct($errorMessage) {
        $this->errorMessage = $errorMessage;
        $code = time() . rand(1, 100);
        $this->message = 'Error Code : ' . $code;
        Log::error( 'ERROR CODE: ' . $code . ' - ' . $this->errorMessage);
    }

}
