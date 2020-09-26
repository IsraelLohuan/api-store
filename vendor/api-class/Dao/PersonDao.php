<?php

namespace Application\Dao;

use Application\Models\Person;
use Application\Database\Connection;
use Application\Database\Query;

class PersonDao extends Connection
{
    private $tableName = "person";
    private $query;

    public function __construct()
    {
        parent::__construct();

        $this->query = new Query($this->getConnection());
    }

    public function getAll():array
    {
        return $this->query->select("SELECT * FROM " . $this->tableName);
    }
}