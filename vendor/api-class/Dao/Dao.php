<?php

namespace Application\Dao;

use Application\Database\Connection;
use Application\Database\Query;

abstract class Dao extends Connection
{
    private $entity;
    private $query;
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

        return $this->query->select("SELECT $columns FROM $this->entity");
    }

    public function getByKey($key) 
    {
        $column = $this->keys["byKey"];

        $sql = "SELECT * FROM $this->entity WHERE $column = '$key'";

        return $this->query->select($sql);
    }

    public function insert(array $values)
    {
        $columns = $this->keys["insert"]["columns"];
        $binds = $this->keys["insert"]["binds"];

        $sql = "INSERT INTO $this->entity ($columns) VALUES ($binds)";
        
        $this->query->executeQuery($sql, Dao::getValues($values, $binds));

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

    public function fieldExists(string $column, string $value):bool
    {
        $sql = "SELECT * FROM person WHERE $column = '$value'";

        $exists = count($this->query->select($sql)) != 0;

        return $exists;
    }
}

