<?php
namespace model\database;

use PDO;
use PDOException;

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=student_management_system";
        $this->username = 'root';
        $this->password = 'password';
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn,$this->username,$this->password);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }
}