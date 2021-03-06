<?php

namespace Application\Dao;

use Application\Database\Connection;
use Application\Database\Query;

abstract class Dao extends Connection
{
    public $query;
    private $entity;
    private $keys;

    public function __construct(string $entity, array $keys)
    {
        parent::__construct();

        $this->keys = $keys;
        $this->entity = $entity;
        $this->query = new Query($this->getConnection());
    }

    public function getAll():array
    {
        $columns = $this->keys["all"];

        return $this->query->select("SELECT $columns FROM $this->entity where deleted = 0");
    }

    public function getByKey($key) 
    {
        $column = $this->keys["byKey"];

        $sql = "SELECT * FROM $this->entity WHERE $column = '$key'";

        return $this->query->select($sql);
    }

    public function insert(array $values, bool $getLastID = false)
    {
        $columns = $this->keys["insert"]["columns"];
        $binds = $this->keys["insert"]["binds"];

        $sql = "INSERT INTO $this->entity ($columns) VALUES ($binds)";
        
        $lastID = $this->query->executeQuery($sql, Dao::getValues($values, $binds));

        if($getLastID) {
            return $lastID;
        }
        
        return "Registro salvo com sucesso!";
    }

    public function update(array $values)
    {
        $query = $this->keys["update"]["query"];
        $binds = $this->keys["update"]["binds"];

        $sql = "UPDATE $this->entity set $query";

        $this->query->executeQuery($sql, Dao::getValues($values, $binds));

        return "Registro atualizado com sucesso!";
    }

    public static function getValues($values, $binds):array
    {
        $bindsArray = explode(',', $binds);
        $valuesFields = array();

        foreach($values as $key => $value) {
           $fieldName = trim($bindsArray[$key]);
           $valuesFields += [ $fieldName => $value ];
        }

        return $valuesFields;
    }

    public function getQueryInstance()
    {
        return $this->query;
    }

    public function fieldExists(string $column, string $value, int $id = -1):bool
    {
        $sql = $id != -1 ? "SELECT * FROM pessoa WHERE $column = :value and id != :id" : "SELECT * FROM pessoa WHERE $column = '$value'";
        
        $result = $this->query->select($sql, array(
            ":value" => $value,
            ":id" => $id
        ));

        $exists = count($result) != 0;

        return $exists;
    }
}

