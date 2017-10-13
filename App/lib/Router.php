<?php 
namespace App\lib;


class Router
{

    
    private static $route = [];
    private static $matches;

        //definit le controller et l'action;
    public static function get ($_route, $callback){

        $_route = trim($_route, '/');
        self::$route[$_route] = $callback;
        
    }

        // lance le router

    public static function run() {
        foreach(self::$route as $_route=>$callback){

            if(self::match($_GET['p'],$_route)) {

                return self::call($callback);
            }
        } 
        header("HTTP/1.0 404 Not Found");
        $controller = new Controller();
        $controller->render('Errors','404');
    }
    
    // matche les differentes routes 

    public static function match($url,$_route){

        $path = preg_replace('#({[a-z]+})#','([a-z0-9\-]+\/?)',$_route);
        //var_dump($path);
        if(!preg_match("#^$path$#", $url, $_matches )){
            
           return false;
        }
        
        array_shift($_matches);
        self::$matches = $_matches;
        return true;
        
    }

    public static function call($callback) {
       
        $params = explode('.',$callback);
         $controller_path = 'App\controllers\\'. ucfirst($params[0]) . 'Controller';
         $action = isset($params[1])? $params[1] : 'index';
         if(class_exists($controller_path)){
             $controller = new $controller_path();    
         } 
         call_user_func_array([$controller,$action],self::$matches);
    }








}