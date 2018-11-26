<?php

include 'config.php';

/**
* database
*/
class LogDb {

	public $conn;
	
	public function __construct($database = "log", $servername = "localhost", $username = "root", $password = "")
	{
		try {
			$this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		}
		catch(PDOException $e)
		{
			echo "connection failed.";
			die();
		}

	}

	public function store($message) {

		$query = $this->conn->prepare('INSERT INTO logs (message) VALUES (:message)');
		$query->execute([':message' => $message]);
	}

	public function getAll() {

		$query = $this->conn->prepare('SELECT * FROM logs');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function deleteAll() {

		$query = $this->conn->prepare('DELETE FROM logs');
		$query->execute();
	}
}