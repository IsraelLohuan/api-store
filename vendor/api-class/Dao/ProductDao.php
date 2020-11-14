<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ProductDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, preco, descricao, desconto, masculino, titulo",
            "byKey" => "id",
            "insert" => [
                "columns" => "preco, descricao, destaque, desconto, masculino, produto_categoria_id, titulo",
                "binds" => ":preco, :descricao, :destaque, :desconto, :masculino, :produto_categoria_id, :titulo"
            ],
            "update" => [
                "columns" => "preco, descricao, destaque, deleted, desconto, masculino, produto_categoria_id, titulo, id",
                "query" => "
                    preco = :preco, 
                    descricao = :descricao, 
                    destaque = :destaque, 
                    deleted = :deleted, 
                    desconto = :desconto, 
                    masculino = :masculino, 
                    produto_categoria_id = :produto_categoria_id,
                    titulo = :titulo
                    WHERE id = :id",
                "binds" =>   ":preco, :descricao, :destaque, :deleted, :desconto, :masculino, :produto_categoria_id, :titulo, :id"     
            ],
       );

       parent::__construct("produto", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}