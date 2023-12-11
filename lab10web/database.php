<?php

class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->loadConfig();
        $this->connect();
    }

    private function loadConfig() {
        include_once("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null) {
        $whereClause = $where ? " WHERE " . $where : "";
        $sql = "SELECT * FROM $table $whereClause";
        $result = $this->query($sql);
        return $result->fetch_assoc();
    }

    public function insert($table, $data) {
        if (is_array($data)) {
            $columns = implode(",", array_keys($data));
            $values = "'" . implode("','", array_values($data)) . "'";
            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
            return $this->query($sql);
        }
        return false;
    }

    public function update($table, $data, $where) {
        $updateValues = implode(",", array_map(function ($key, $val) {
            return "$key='$val'";
        }, array_keys($data), array_values($data)));

        $sql = "UPDATE $table SET $updateValues WHERE $where";
        return $this->query($sql);
    }

    public function delete($table, $filter) {
        $sql = "DELETE FROM $table $filter";
        return $this->query($sql);
    }
}
?>
