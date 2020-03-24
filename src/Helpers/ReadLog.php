<?php 

namespace Hexters\Ladmin\Helpers;

class ReadLog {

  public function handle() {
    $files = scandir(base_path('/storage/logs'));
    $logs = [];
    foreach($files as $file) {
        $log = base_path('/storage/logs/' . $file);
        if(file_exists($log)) {
            $fn = fopen($log, "r");
            $getLine = 1;
            while(! feof($fn))  {
                $line = fgets($fn);
                if(preg_match('/LADMIN_EXCEPTION.*/', $line)) {
                    $line = str_replace(' local.ERROR: ', '', $line);
                    $explode = explode('LADMIN_EXCEPTION', $line);
    
                    
                    $body = explode('||',$explode[1]);
                    $payload = [];
                    foreach($explode as $i => $item) {
                        if($i > 1) {
                            $payload[] = $item;
                        }
                    }
    
                    $date = str_replace('[', '', $explode[0]);
                    $date = str_replace(']', '', $date);
                    $logs[] = [
                        'date' => $date,
                        'code' => trim($body[0]),
                        'error' => trim($body[1]),
                        'payload' => $payload,
                        'file_name' => $file,
                        'line' => $getLine
                    ];
    
                    
                }
                $getLine++;
            }
            fclose($fn);
        }
    }
    return $logs;
  }

}