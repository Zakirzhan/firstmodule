<?php

/**
 * MyDB - быстрый и легкий PHP библиотека для того, чтобы получить данные из базы данных без знания sql.
 *
 *
 * @link      https://github.com/Zakirzhan/php-course-firstapp/blob/master/app/models/MyDB.class.php
 * @author    Zakirzhan
 * @copyright 2020
 */


/**
 * Class MyDB
 */
/**
 * @method public $this getAllItems(?string $table, ?int $count)
 * @method public $this getItem(?string $table, ?int $id)
 * @method public $this deleteItem(?string $table,int $id)
 * @method public $this updateItem(?string $table, ?int $id, array $data)
 * @method private $this implodeData(array $data)
 */

class DataBase {

	 /** 
	 * @var \PDO
	  */
    protected $pdo; 
		
	// db connection config vars
	private $user = DBUSER;
	private $pass = DBPWD;
	private $dbName = DBNAME;
	private $dbHost = DBHOST;
	private $charset = DBcharset;

    /**
     * QueryBuilder constructor.
     *
     * @param array| массив с данными для подключения к DB
     */
	public function __construct() {

		try {
		    
		  $this->pdo = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName.';charset='.$this->charset.';', $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

		} catch (PDOException $e) {
		    die("Соединение оборвалось: " . $e->getMessage());
		}

	}

}

?>