<?php

class Logger 
{

    const FILEPATH = 'logs/log.txt';
    
    public function __construct() {
        $this->clear();
    }

    /**
     * 
     * @param sting $message
     */
    public function log($message) 
    {
        echo $message . '<br>';
        if (isset($message)) {
            $f = fopen(self::FILEPATH, 'a');
            fwrite($f, (string) $message . PHP_EOL);
            fclose($f);
        }
    }

    public function clear() 
    {
        $f = fopen(self::FILEPATH, "w");
        fclose($f);        
    }    
    
}
