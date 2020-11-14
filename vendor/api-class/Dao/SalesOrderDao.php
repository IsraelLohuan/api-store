<?php

namespace Application\Dao;

use Application\Dao\Dao;

class SalesOrderDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "preco, id_pessoa, status_pedido_id, endereco_id",
                "binds" => ":preco, :id_pessoa, :status_pedido_id, :endereco_id"
            ],
            "update" => [
                "columns" => "id, preco, id_pessoa, status_pedido_id, endereco_id, deleted",
                "query" => "
                    preco = :preco,
                    id_pessoa = :id_pessoa,
                    status_pedido_id = :status_pedido_id,
                    endereco_id = :endereco_id,
                    deleted = :deleted,
                    WHERE id = :id",
                "binds" =>   ":preco, :id_pessoa, :status_pedido_id, :endereco_id, :deleted, :id"     
            ],
       );

       parent::__construct("pedido", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}