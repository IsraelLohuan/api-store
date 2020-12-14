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
                "columns" => "preco, descricao, destaque, desconto, masculino, produto_categoria_id, titulo, url_image",
                "binds" => ":preco, :descricao, :destaque, :desconto, :masculino, :produto_categoria_id, :titulo, :url_image"
            ],
            "update" => [
                "columns" => "preco, descricao, destaque, deleted, desconto, masculino, produto_categoria_id, titulo, url_image, id",
                "query" => "
                    preco = :preco, 
                    descricao = :descricao, 
                    destaque = :destaque, 
                    deleted = :deleted, 
                    desconto = :desconto, 
                    masculino = :masculino, 
                    produto_categoria_id = :produto_categoria_id,
                    titulo = :titulo,
                    url_image = :url_image
                    WHERE id = :id",
                "binds" =>   ":preco, :descricao, :destaque, :deleted, :desconto, :masculino, :produto_categoria_id, :titulo, :url_image, :id"     
            ],
       );

       parent::__construct("produto", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}