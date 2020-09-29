<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ProductDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, price, description, value_discount, male, title",
            "byKey" => "id",
            "insert" => [
                "columns" => "price, description, spotlight, value_discount, male, product_category_id, title",
                "binds" => ":price, :description, :spotlight, :value_discount, :male, :product_category_id, :title"
            ],
            "update" => [
                "columns" => "price, description, spotlight, deleted, value_discount, male, product_category_id, title, id",
                "query" => "
                    price = :price, 
                    description = :description, 
                    spotlight = :spotlight, 
                    deleted = :deleted, 
                    value_discount = :value_discount, 
                    male = :male, 
                    product_category_id = :product_category_id,
                    title = :title
                    WHERE id = :id",
                "binds" =>   ":price, :description, :spotlight, :deleted, :value_discount, :male, :product_category_id, :title, :id"     
            ],
       );

       parent::__construct("product", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}
