<?php

namespace Application\Database;

abstract class Connection 
{
    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "root";
    const DBNAME   = "db_store";

    private $conn;

    public function __construct() 
    {
        try {
            $this->conn = new \PDO(
                "mysql:dbname=".Connection::DBNAME.";host=".Connection::HOSTNAME,
                Connection::USERNAME,
                Connection::PASSWORD
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "Falha ao conectar ao Banco de dados :|\n\nAviso: ".$e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
