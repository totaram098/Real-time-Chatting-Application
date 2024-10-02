<?php 
	require_once('database_setting.php');
	mysqli_report(false);
	abstract class databaseConnection{
		public $hostname;
		public $username;
		public $password;
		public $database;
		public abstract function __construct($hostname,$username,$password,$database);
		public abstract function execute_query($query);
	}

	class Database extends databaseConnection{
		protected $query;
		protected $result;
		public $connection;
		public function __construct($hostname,$username,$password,$database){
			$this->hostname = $hostname;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
			mysqli_report(false);
			$this->connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
			if (mysqli_connect_errno()) {
				die("Connection Failed..!<br>Error Message : ".mysqli_connect_error());
			}
		}

		public function execute_query($query){
			$this->query = $query;
			$this->result = mysqli_query($this->connection,$this->query);
			return $this->result;
		}

	}

	$database = new Database(HOSTNAME,USERNAME,PASSWORD,DATABASE);
?>