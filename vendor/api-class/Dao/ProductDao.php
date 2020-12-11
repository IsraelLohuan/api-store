<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ProductDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "preco, descricao, destaque, desconto, masculino, produto_categoria_id, titulo, filename",
                "binds" => ":preco, :descricao, :destaque, :desconto, :masculino, :produto_categoria_id, :titulo, :filename"
            ],
            "update" => [
                "columns" => "preco, descricao, destaque, deleted, desconto, masculino, produto_categoria_id, titulo, filename, id",
                "query" => "
                    preco = :preco, 
                    descricao = :descricao, 
                    destaque = :destaque, 
                    deleted = :deleted, 
                    desconto = :desconto, 
                    masculino = :masculino, 
                    produto_categoria_id = :produto_categoria_id,
                    titulo = :titulo,
                    filename = :filename
                    WHERE id = :id",
                "binds" =>   ":preco, :descricao, :destaque, :deleted, :desconto, :masculino, :produto_categoria_id, :titulo, :filename, :id"     
            ],
       );

       parent::__construct("produto", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}