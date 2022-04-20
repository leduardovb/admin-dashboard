<?php

namespace App\DB;

use PDO;
use PDOException;

class Database {

    const HOST = 'localhost';

    const NAME = 'STORE';

    const USER = 'root';

    const PASS = '';

    private $table;

    private $connection;

    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die('ERROR '.$error->getMessage());
        }
    }

    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $error) {
            print_r($error);
            return false;
        }
    }

    public function insert($values) {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), "?");
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }

    public function update($values, $where = null) {
        $fields = array_keys($values);
        $implodeFields = implode(' = ?, ', $fields)." = ?";
        $where = strlen($where) ? parseWhere(parseProperties("filters", $where)) : "";
        $query = "UPDATE ".$this->table." SET ".$implodeFields." ".$where;
        return $this->execute($query, array_values($values));
    }

    public function select($where = null, $joins = null , $fields = "*", $limit = null) {
        $where = strlen($where) ? parseWhere(parseProperties("filters", $where)) : "";
        $joins = strlen($joins) ? parseJoin(parseProperties("includes", $joins)) : "";
        $limit = strlen($limit) ? "LIMIT $limit" : "";
        $query = "SELECT ".$fields." FROM ".$this->table." ".$joins." ".$where." ".$limit;
        return $this->execute($query);
    }

    public function delete($where) {
        $where = strlen($where) ? parseWhere(parseProperties("filters", $where)) : "";
        $query = "DELETE FROM"." ".$this->table." ".$where;
        return $this->execute($query);
    }

}