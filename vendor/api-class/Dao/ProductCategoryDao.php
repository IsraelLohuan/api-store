<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ProductCategoryDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "descricao",
                "binds" => ":descricao"
            ],
            "update" => [
                "columns" => "descricao, id",
                "query" => "descricao = :descricao WHERE id = :id",
                "binds" => ":descricao, :id"     
            ],
       );

       parent::__construct("produto_categoria", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}