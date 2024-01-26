<?php
namespace Admin\Lib;

use PDO, PDOException;


abstract class Database
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "newsweb";

    public function connectDB()
    {
        try {
            $conn = "mysql:host=" . $this->server . ";dbname=" . $this->db;

            $pdo = new PDO($conn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Database connection failed" . $e->getMessage();
            return null;
        }
    }

    public function prepare($sql)
    {
        return $this->connectDB()->prepare($sql);
    }
}
?>