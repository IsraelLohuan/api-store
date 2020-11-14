<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ItemOrderDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, id_produto, id_pedido, deleted",
            "byKey" => "id",
            "insert" => [
                "columns" => "id_produto, id_pedido",
                "binds" => ":id_produto, :id_pedido"
            ],
            "update" => [
                "columns" => "id_produto, id_pedido, deleted, id",
                "query" => "id_produto = :id_produto, id_pedido = :id_pedido, deleted = :deleted WHERE id = :id",
                "binds" => ":id_produto, :id_pedido, :deleted, :id"     
            ],
       );

       parent::__construct("item_pedido", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}