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
                "columns" => "senha, admin, pessoa_id",
                "binds" => ":senha, :admin, :pessoa_id"
            ],
            "update" => [
                "columns" => "id, senha, admin, pessoa_id",
                "query" => "
                    senha = :senha,
                    admin = :admin,
                    pessoa_id = :pessoa_id
                    WHERE id = :id",
                "binds" =>   ":senha, :admin, :pessoa_id, :id"     
            ],
       );

       parent::__construct("usuario", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}