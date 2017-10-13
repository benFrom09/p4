<?php

namespace App;

use App\lib\Database;
use App\lib\Config;
use App\lib\Router;



class App
{
        protected static $db;

    // renvoie une instance de Database

       public static function connect () {
        if(self::$db === null) {
            self::$db = new Database(Config::get('db_settings'));
        }
        
        return self::$db;
      
    }

    
    
    //demarre l'application

    public static function run() {
        session_start();
        
         self::route();
         Router::run();
         
    }

    //definit les differente routes

    private static function route() {
        Router::get('/', 'post.index');
        Router::get('/post', 'post.index');
        Router::get('/page/{id}','post.index');
        Router::get('/login', 'admin.login');
        Router::get('/register', 'admin.register');
        Router::get('/post/{id}', 'post.show');
        Router::get('/admin','admin.index');
        Router::get('/edition/{id}','admin.edit');
        Router::get('/delete/{id}','admin.delete');
        Router::get('/ajouter','admin.add');
        Router::get('/comments/{id}','admin.comments');
        Router::get('/deleteComment/{id}','admin.deleteComment');
        Router::get('/logout', 'admin.logout');
        Router::get('comments','admin.allComment');
    }

    public static function logout() {
        session_destroy();
        header('location:login');
    }

    public static function alert() {
        if(isset($_SESSION['msg'])) {
            foreach($_SESSION['msg'] as $k =>$v) { 
                 echo '<div class="alert alert-'. $k .'">"'. $v .'"</div>';
                   unset($_SESSION['msg']);
                
            }
        }
        
        
    }

 
}