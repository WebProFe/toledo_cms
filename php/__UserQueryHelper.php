<?php
class __UserQueryHelper {


	/**
	* This method does what it says, it inserts a username and a password
	* using the given connection. It used prepared statements in order
	* to perform a syntax check on the variables passed (safe for SQL injection).
	*/
	public static function insertUser($connection, $username, $password) {
		$success = false;

		$query = "INSERT INTO users (username, password) VALUES (?,?)";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		
		$success = $stmt->execute();
		$stmt->close();

		return $success;
	}	
}
?>