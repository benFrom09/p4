<?php
namespace App\lib;
use App\App;

class Controller
{
  
    //instance de database;
    protected $db;


    //permet de rendre une vue

    public function render($viewpath,$view, $var = []) {
      
      ob_start();
      extract($var);
      require APP . DS . 'views\\' . $viewpath. DS . $view . '.php';
     // echo  '</br> ' . $view . '.php';
      $content = ob_get_clean();
      require APP.'\views\layout\\'.'default'. '.php';

    }

    //permet de charger les modeles 

    protected function loadModel($name) {
      $class = 'App\models\\'. ucfirst($name) . 'Model';
      $this->$name = new $class($this->db);
    }
}