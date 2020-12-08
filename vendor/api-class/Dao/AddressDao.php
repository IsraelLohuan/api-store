<?php

namespace Application\Dao;

use Application\Dao\Dao;

class AddressDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "rua, logradouro, uf, cidade, bairro, cep, numero, descricao, id_pessoa",
                "binds" => ":rua, :logradouro, :uf, :cidade, :bairro, :cep, :numero, :descricao, :id_pessoa"
            ],
            "update" => [
                "columns" => "rua, logradouro, uf, cidade, bairro, cep, numero, descricao, deleted, id_pessoa, id",
                "query" => "rua = :rua, logradouro = :logradouro, uf = :uf, cidade = :cidade, bairro = :bairro, cep = :cep, numero = :numero, descricao = :descricao, deleted = :deleted, id_pessoa = :id_pessoa WHERE id = :id",
                "binds" => ":rua, :logradouro, :uf, :cidade, :bairro, :cep, :numero, :descricao, :deleted, :id_pessoa, :id"     
            ],
       );

       parent::__construct("endereco", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}