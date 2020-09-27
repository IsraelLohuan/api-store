<?php

namespace Application\Dao;

use Application\Dao\Dao;

class UserDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "password, admin, id_person",
                "binds" => ":password, :admin, :id_person"
            ],
            "update" => [
                "columns" => "id, password, admin, id_person",
                "query" => "
                    password = :password,
                    admin = :admin,
                    id_person = :id_person
                    WHERE id = :id",
                "binds" =>   ":password, :admin, :id_person, :id"     
            ],
       );

       parent::__construct("user", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}