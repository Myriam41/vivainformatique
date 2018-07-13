<?php

namespace App\Entity;

/**
 * class Log
 */
class Log
{
        /**
     * @var int 
     * connection status
     */
    private $connect = 'off';
    
    /**
     * @param int connect
     */
    private function setConnect($connect){
        $this->connect = $connect;
    }

    /**
     * @return $connect
     */
    public function getConnect(){
        return $this->connect;
    }
}