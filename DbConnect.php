<?php 
	class DbConnect {
		private $host;
		private $dbName;
		private $user;
		private $pass;

		public function __construct() {
			$this->host = getenv( varname: 'MYSQL_HOST');
			$this->dbname = getenv( varname: 'MYSQL_DB');
			$this->user = getenv( varname: 'MYSQL_USER');
			$this->pass = getenv( varname: 'MYSQL_PASS');
		}
		public function connect() {
			try {
				$conn = new PDO($this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch( PDOException $e) {
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}
 ?>
