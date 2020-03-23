<?php

namespace Hexters\Ladmin\Exceptions;

use Exception;
use Log;
use Carbon\Carbon;

class LadminException extends Exception {
    
    protected $errorMessage;
    public function __construct($errorMessage) {
        $this->errorMessage = $errorMessage;
        $code = time();
        $this->message = 'Error Code : ' . $code;

        Log::error('LADMIN_EXCEPTION->>' . Carbon::now() . '||' . $code . '||' . $this->errorMessage . '<<-LADMIN_EXCEPTION');
    }

}
