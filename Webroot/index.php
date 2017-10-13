<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('WEBROOT', ROOT.DS.'Webroot');
define('APP',ROOT.DS.'App');



require '../App/Autoloader.php';

App\Autoloader::register();
App\App::run();
