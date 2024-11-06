<?php
 class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "news";
    private $conn;
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function closeConnection() {
        $this->conn = null;
    }

    public function getConnection() {
        return $this->conn;
    }
 }

?>