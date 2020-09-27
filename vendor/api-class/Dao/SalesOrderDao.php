<?php

namespace Application\Dao;

use Application\Dao\Dao;

class SalesOrder extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "price, person_id, status_order_id, address_id",
                "binds" => ":price, :person_id, :status_order_id, :address_id"
            ],
            "update" => [
                "columns" => "id, price, person_id, status_order_id, address_id",
                "query" => "
                    price = :price,
                    person_id = :person_id,
                    status_order_id = :status_order_id,
                    address_id = :address_id
                    WHERE id = :id",
                "binds" =>   ":price, :person_id, :status_order_id, :address_id, :id"     
            ],
       );

       parent::__construct("user", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}