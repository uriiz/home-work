<?php


class DbConnections
{
    private $user ;
    private $host;
    private $pass ;
    private $db;

    public function __construct()
    {

        $this->user = "homestead";
        $this->host = "localhost";
        $this->pass = "secret";
        $this->db = "home_work";

        $this->connect();
    }
    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }
}

