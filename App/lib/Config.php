<?php
namespace App\lib;




class Config
{
        protected static $settings = [];

    public static function get($k) {
        require '../App/dbconfig.php';
        return isset(self::$settings[$k]) ? self::$settings[$k] : null ;
    }

    public static function set($k,$v){
        self::$settings[$k] = $v;
    }


     








}