<?php

namespace Application\Dao;

use Application\Dao\Dao;

class AddressDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, rua, logradouro, uf, cidade, bairro, cep, numero, descricao, deleted",
            "byKey" => "id",
            "insert" => [
                "columns" => "rua, logradouro, uf, cidade, bairro, cep, numero, descricao",
                "binds" => ":rua, :logradouro, :uf, :cidade, :bairro, :cep, :numero, :descricao"
            ],
            "update" => [
                "columns" => "rua, logradouro, uf, cidade, bairro, cep, numero, descricao, deleted, id",
                "query" => "rua = :rua, logradouro = :logradouro, uf = :uf, cidade = :cidade, bairro = :bairro, cep = :cep, numero = :numero, descricao = :descricao, deleted = :deleted WHERE id = :id",
                "binds" => ":rua, :logradouro, :uf, :cidade, :bairro, :cep, :numero, :descricao, :deleted, :id"     
            ],
       );

       parent::__construct("endereco", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}