<?php

namespace Application\Dao;

use Application\Dao\Dao;

class PersonDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "email",
            "insert" => [
                "columns" => "nome, documento, telefone, file_name, email, senha, admin",
                "binds" => ":nome, :documento, :telefone, :file_name, :email, :senha, :admin"
            ],
            "update" => [
                "columns" => "nome, telefone, deleted, file_name, email, senha, admin, id",
                "query" => "nome = :nome, telefone = :telefone, deleted = :deleted, file_name = :file_name, email = :email, senha = :senha, admin = :admin WHERE id = :id",
                "binds" => ":nome, :telefone, :deleted, :file_name, :email, :senha, :admin, :id"     
            ],
       );

       parent::__construct("pessoa", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }

    public function login($email, $senha) 
    {
        $result = $this->query->select("SELECT * FROM pessoa where email = :email and senha = :senha and deleted = :deleted", array(
            ":email" => $email,
            ":senha" => $senha,
            ":deleted" => 0
        ));

        return $result;
    }
}