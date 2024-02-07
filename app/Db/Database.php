<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database {
    const HOST = "localhost";
    const NAME = "wdev_vagas";
    const USER = "root";
    const PASS = "100267";

    private $table;
    private $connection;

    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }
    private function execute($query, $params = []){
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("ERROR: ". $e->getMessage());
        }
    }
    public function insert($values){
        $fields = array_keys($values);
        $blinds = array_pad([],count($values),'?');
        $query = 'INSERT INTO vagas ('.implode(',', $fields).') VALUES ('.implode(',', $blinds).')';
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();

    }
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: ". $e->getMessage());
        }

    }
}