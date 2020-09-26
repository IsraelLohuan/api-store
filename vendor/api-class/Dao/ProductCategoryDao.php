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
                "columns" => "category_description",
                "binds" => ":category_description"
            ],
            "update" => [
                "columns" => "category_description, id",
                "query" => "category_description = :category_description WHERE id = :id",
                "binds" => ":category_description, :id"     
            ],
       );

       parent::__construct("product_category", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}