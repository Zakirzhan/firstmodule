<?php 	

/**
 * Routes - быстрый и легкий PHP router.
 *
 *
 * @link      https://github.com/Zakirzhan/firstmodule/blob/master/app/models/Router.class.php
 * @author    Zakirzhan
 * @copyright 2020
 */


/**
 * Class Routes
 */
/**
 * @method static $this start(string $route, Callable $callback)
 * @method static $this getRoutes(Callable $callback)
 */

class Routes {    

    /**
     * @var string| ссылка на папку контроллеров
     */
    protected static $controllers_dir = CONTROLLERS_DIRECTORY;

    /**
     * @var string| название файла главной страницы
     */
    protected static $main_page = MAIN_PAGE;

    /**
     * @var string| название файла ошибки, когда необходимый контроллер отсутствует
     */
    protected static $error_page = ERROR_PAGE;
    
    /**
     * @var string| все запросы после "site.com/"
     */
    protected static $requests = REQUESTS;
	/**
     * start
     * Понадобится, чтобы подключить соответсвующий файл
     * @return NULL
     */



    public static function start() {

        $mydb = new MyDB_Helper();  

    	$routes = self::getRoutes();

    	$page = $routes[1];

        return $routes;
    	
    } 

     // function Error404()
     //    {
     //        $domain_name = 'http://'.$_SERVER['http_host'].'/';
     //        header('HTTP/1.1 404 Not Found');
     //            header('Status: 404 Not Found');
     //            header('Location:'.$domain_name.'404');
     //    }
        

    public static function getRoutes(){
       return explode('/', self::$requests);
    }

}


 ?>