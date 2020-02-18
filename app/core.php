<?php 
define("REQUESTS", $_SERVER['REQUEST_URI']);

//добавляем конфиг
require_once('config.php');

//добавляем класс сессии
require_once('app/models/Session.class.php');
Session::start();


//добавляем класс уведомления
require_once('app/models/Flash.class.php');

//добавляем класс базы данных
require_once('app/models/MyDB.class.php');
require_once('app/models/MyDB_Helper.class.php');
$mydb = new MyDB_Helper();

//добавляем класс routes
// require_once('app/models/Routes.class.php');
// $routes = Routes::start();

$routes = explode('/', REQUESTS);


	$page = $routes[1]; 

	if(empty($page)){

		include CONTROLLERS_DIRECTORY.'/main.php';

	} else {

	  (@include CONTROLLERS_DIRECTORY.'/' . $page . '.php') or include(CONTROLLERS_DIRECTORY.'/404.php');

	}
 

//закрываем базу
$mydb->close();
 ?>