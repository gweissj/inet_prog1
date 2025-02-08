<?php
class Database {
    private $host = 'localhost:3308';
    private $db_name = 'bank - kuzbank';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Подключение к базе данных
    public function connect() {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>