<?php 
/**
 * Session - легкий класс для хранения данных.
 *
 *
 * @link      https://github.com/Zakirzhan/firstmodule/blob/master/app/models/Session.class.php
 * @author    Zakirzhan
 * @copyright 2020
 */


/**
 * Class Session
 */
/**
 * @method static $this start(string $route, Callable $callback)
 * @method static $this set(string $key, string $value, Callable $callback)
 * @method static $this get(string $key, Callable $callback)
 * @method static $this destroy()
 */

class Session
{
    public static function start()
    {
        @session_start();
    }
 
    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }
 
    public static function get($key)
    {
        if(isset($_SESSION[$key]) ) {
            return $_SESSION[$key];
        }
        return NULL;
    }
 
    public static function destroy()
    {
        session_destroy();
    }
}
 ?>