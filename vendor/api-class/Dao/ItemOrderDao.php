<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ItemOrderDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, product_id, sale_order_id, deleted",
            "byKey" => "id",
            "insert" => [
                "columns" => "product_id, sale_order_id",
                "binds" => ":product_id, :sale_order_id"
            ],
            "update" => [
                "columns" => "product_id, sale_order_id, deleted, id",
                "query" => "product_id = :product_id, sale_order_id = :sale_order_id, deleted = :deleted WHERE id = :id",
                "binds" => ":product_id, :sale_order_id, :deleted, :id"     
            ],
       );

       parent::__construct("item_order", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}