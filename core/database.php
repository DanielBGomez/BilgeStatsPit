<?php
class Database {
	
	private static $host='localhost';
	private static $user = 'root';				
	private static $password = '';
	protected $database = 'aguasturbias';
	protected $query;
	protected $rows;
	private $conn;
		
	public function __construct(){
	}
	public function __destruct(){
		unset($this);
	}
	
	private function connect(){
		$this->conn = mysqli_connect(self::$host, self::$user, self::$password, $this->database);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	function disconnect() {
		mysqli_close($this->conn);
	}

	protected function execute_returning_id() {
		$this->connect();
		mysqli_query($this->conn,$this->query) or die('Error al ejecutar query: ' . mysqli_error($this->conn));
		return $this->conn->insert_id;
		$this->disconnect();
	}
	protected function execute_single_query () {
		$this->connect();
		mysqli_query($this->conn,$this->query) or die('Error al ejecutar query: ' . mysqli_error($this->conn).'<META HTTP-EQUIV="REFRESH" CONTENT="1;URL='.$_SERVER['PHP_SELF'].'">');
		$this->disconnect();
	}
	protected function get_result_from_query(){
		$this->connect();
		$this->rows = array();
		$result = mysqli_query($this->conn,$this->query) or die('Error al ejecutar query: ' . mysqli_error($this->conn));
		while ($this->rows[] = mysqli_fetch_row($result)) {}
		$this->disconnect();
		array_pop($this->rows);
	}
}
?>