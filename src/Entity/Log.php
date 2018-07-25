<?php

namespace App\Entity;

/**
 * class Log
 */
class Log
{
    /**
     * @var int 
     * connection connect
     */
    static private $connect = 0;
    /**
     * @var int 
     * connection status
     */
    static private $status = 0;
    
    /**
     * @param int connect
     */
    static public function setConnect(){
        self::$connect = $_SESSION['connect'];
    }

    /**
     * @return $connect
     */
    static public function getConnect(){
        return self::$connect;
    }

        /**
     * @param string status
     */
    static public function setStatus(){
        self::$status = $_SESSION['status'];
    }

    /**
     * @return $status
     */
    static public function getStatus(){
        return self::$status;
    }
}