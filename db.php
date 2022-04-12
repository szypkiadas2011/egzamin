<?php

class DB
{
    protected mysqli $conn;

    public function __construct()
    {
        $this->conn = new mysqli('127.0.0.1', 'nonek', '', 'egzamin');
    }

    public function sql(string $str): mysqli_result | bool
    {
        return $this->conn->query($str);
    }

    public function close(): void
    {
        $this->conn->close();
    }
}