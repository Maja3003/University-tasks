<?php
class Database {
    private $connection;

    public function __construct($host, $user, $password, $database) {
        $this->connection = new mysqli($host, $user, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {  //poniewaz $connection jest prywatne i nie ma do niego dostepu
        return $this->connection;
    }

    public function __destruct() {
        $this->connection->close();
    }
}
?>