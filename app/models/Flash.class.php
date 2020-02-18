<?php 
/**
 * Flash - основанный на сессиях компонент, для вывода флеш сообщений/уведомлений
 *
 *
 * @link      https://github.com/Zakirzhan/firstmodule/blob/master/app/models/Flash.class.php
 * @author    Zakirzhan
 * @copyright 2020
 */


/**
 * Class Flash
 */
/**
 * @method static $this start(string $route, Callable $callback)
 * @method static $this set(string $key, string $value, Callable $callback)
 * @method static $this get(string $key, Callable $callback)
 * @method static $this destroy()
 */

class Flash
{
    public static function get(?int $key)
    {       
       return self::error($key);
    }
 
    public static function error($key)
    {
       switch ($key) {
          case 1:
            return "Email and  password combination is incorrect!";
            break;
          
          case 2:
            return "Email is not found in our database!";
            break;
           case 3:
            return "Email is not valid!"; 
            break;

            case 4:
            return "Email is exists in our DB!"; 
            break;
        } 

        return NULL;
    } 
}
 ?>