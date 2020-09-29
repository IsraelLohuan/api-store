<?php

namespace Application\Dao;

use Application\Dao\Dao;

class ProductImageDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "product_id, file_name_image",
                "binds" => ":product_id, :file_name_image"
            ],
            "update" => [
                "columns" => "product_id, file_name_image, id",
                "query" => "
                    product_id = :product_id,
                    file_name_image = :file_name_image
                    WHERE id = :id",
                "binds" => ":product_id, :file_name_image, :id"     
            ],
       );

       parent::__construct("product_image", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}