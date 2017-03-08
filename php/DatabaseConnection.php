<?php
class DatabaseConnection {
    private $username = "root";
    private $password = "root";
    private $host = "localhost";
    private $database = "toledo";
    public  $connection; 

    

    public function createConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        $this->printConnectionStatus();
    }
    
    
    public function closeConnection() {
        mysqli_close($this->connection);
    }
    
    
    public function getConnection() {
        return $this->connection;
    }

    private function printConnectionStatus() {
        if (!$this->connection)
            echo "Connection was not successfull!";
        /*else 
            echo "Connection was successfull!";*/
    }
}
?>