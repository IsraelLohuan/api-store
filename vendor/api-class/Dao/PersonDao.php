<?php

namespace Application\Dao;

use Application\Dao\Dao;

class PersonDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, nome, data_cadastro, file_name, email",
            "byKey" => "email",
            "insert" => [
                "columns" => "nome, documento, telefone, file_name, email",
                "binds" => ":nome, :documento, :telefone, :file_name, :email"
            ],
            "update" => [
                "columns" => "nome, telefone, deleted, file_name, email, id",
                "query" => "nome = :nome, telefone = :telefone, deleted = :deleted, file_name = :file_name, email = :email WHERE id = :id",
                "binds" => ":nome, :telefone, :deleted, :file_name, :email, :id"     
            ],
       );

       parent::__construct("pessoa", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}