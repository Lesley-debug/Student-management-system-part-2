<?php
class Database {
    private $host = "localhost";
    private $db_name = "internship-task4";
    private $username = "root";
    private $password = "";
    protected $conn;

    public function connect() {  // ✅ must be exactly "connect"
        $this->conn = null;
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
