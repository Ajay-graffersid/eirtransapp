<?php

namespace App\Helpers;

use View;
use Session;
/**
 * 
 */
class CommonHelper
{
    public function csvToArray($filename = '', $delimiter = ','){
        
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    // Set Flash Message function
    public function flash_message($class, $message){
        Session::flash('alert-class', 'alert-'.$class);
        Session::flash('message', $message);
    }
}

?>