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
/**
 * Class MyDB_Helper
 */
/**
 * @method public $this getAllItems(?string $table, ?int $count)
 * @method public $this getItem(?string $table, ?int $id)
 * @method public $this deleteItem(?string $table,int $id)
 * @method public $this updateItem(?string $table, ?int $id, array $data)
 * @method private $this implodeData(array $data)
 */
class MyDB_Helper extends MyDB {
	 /**
     * Get All Items 
     *
     * @param string|$table название таблицы в базе данных
     * @param int|$count количество возвращаемых элементов
     *
     * @return array| \PDOStatement::fetchAll() - возвращает массив, содержащий все оставшиеся строки результирующего набора
     */

	public function getAllItems(?string $table, ?int $count = 25){

		$stmt = $this->pdo->prepare("SELECT * FROM `$table`");
	 
		$stmt->execute();

		$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $posts;

	}

	/**
     * Get Item 
     *
     * @param string|$table название таблицы в базе данных
     * @param int|$id - возвращаемого элемента
     *
     * @return array| \PDOStatement::fetch() - возвращает массив значений одного столбца
     */

	public function getItem(?string $table, array $data = []){


		$sql_query = "SELECT * FROM `$table`";
		
		$sql_query .= " WHERE ".$this->implodeData($data,'where'); 
		
		$stmt = $this->pdo->prepare($sql_query);

		$stmt->execute(); 

		$posts = $stmt->fetch(PDO::FETCH_ASSOC);

		return $posts;
	}


	/**
     * Delete Item 
     *
     * @param string|$table название таблицы в базе данных
     * @param int|$id - удаляемого элемента
     *
     * @return null
     */

	public function deleteItem(?string $table, ?int $id){
 
		$stmt = $this->pdo->prepare("DELETE FROM `$table` WHERE 'id' = ?");
		
		$stmt->bindValue(1, $id, PDO::PARAM_INT);	

		$stmt->execute(); 

		$count = $del->rowCount();

		/* Получим количество удаленных записей */
		return ("Усешно удалили $count элементов из `$table`");

	}


	/**
     * Insert Item 
     *
     * @param string|$table - название таблицы в базе данных
     * @param int|$id - обновляемого элемента
     * @param array|$data - данные для обновления, пример: $array['id'] = {ID}, $array['name'] = {NAME}; 
     *
     * @return null
     */


	public function insertItem(?string $table, array $data = []){

        $sql_query = "INSERT INTO `$table`";

		$sql_query .= $this->implodeData($data,'insert'); 

		$stmt = $this->pdo->prepare($sql_query);
		
		$stmt->execute(); 

	}	 


	/**
     * Update Item 
     *
     * @param string|$table - название таблицы в базе данных
     * @param int|$id - обновляемого элемента
     * @param array|$data - данные для обновления, пример: $array['id'] = {ID}, $array['name'] = {NAME}; 
     *
     * @return null
     */


	public function updateItem(?string $table, ?int $id, array $data = []){

        $sql_query = "UPDATE `$table`";

		$sql_query .= " SET " . $this->implodeData($data);

        $sql_query .= " WHERE 'id' = $id";

		$stmt = $pdo->prepare($sql_query);

		$stmt->execute(); 

	}	 

    /**
     * Data Imploder
     *
     * @param array| $data - массив с данными с ключами
     *
     * @return string| пример - "'id' = :id, 'name' = :name"
     */

	private function implodeData(array $data, ?string $method = 'update'){

		$set = [];

		$query = '';	

		switch ($method) {

			case 'insert':	

				$keys = array_keys($data); 

				// result: (key, key2) VALUES (:key, :key2)
				$query = "(".implode(', ', $keys).") VALUES ('".implode("', '", $data)."')";
				break;

			default: 
				// result: 'key' = value { , | AND } 'key2' = value2
				foreach ($data as $key => $value) {
					$set[] = "`$key` = '$value'";
				}

				if($method == 'where') $glue = ' AND ';
				else $glue = ', ';

				$query = implode($glue, $set);
				break;
		}
 
		return $query;

	}
	} ?>