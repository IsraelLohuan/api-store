<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ItemOrderDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "id_produto, id_pedido, quantidade, preco, desconto",
                "binds" => ":id_produto, :id_pedido, :quantidade, :preco, :desconto"
            ],
            "update" => [
                "columns" => "id_produto, id_pedido, deleted, id, quantidade, preco, desconto",
                "query" => "id_produto = :id_produto, id_pedido = :id_pedido, deleted = :deleted, quantidade = :quantidade, preco = :preco, desconto = :desconto WHERE id = :id",
                "binds" => ":id_produto, :id_pedido, :deleted, :id, :quantidade, :preco, :desconto"     
            ],
       );

       parent::__construct("item_pedido", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }

    public function getItemsOrder($idOrder) 
    {
        return $this->query->select("SELECT i.id, i.id_pedido, i.deleted, i.quantidade, i.preco, i.desconto,
        p.titulo FROM item_pedido as i
        INNER JOIN produto as p
        WHERE p.id = i.id_produto and i.id_pedido = " . $idOrder . " and i.deleted = 0");
    }
}