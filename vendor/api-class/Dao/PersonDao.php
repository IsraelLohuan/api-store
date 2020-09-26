<?php

namespace Application\Dao;

use Application\Dao\Dao;

class PersonDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, name, date_register, file_name_image, email",
            "byKey" => "email",
            "insert" => [
                "columns" => "name, document, cellphone, file_name_image, email",
                "binds" => ":name, :document, :cellphone, :file_name_image, :email"
            ],
            "update" => [
                "columns" => "name, cellphone, file_name_image, email, id",
                "query" => "name = :name, cellphone = :cellphone, file_name_image = :file_name_image, email = :email WHERE id = :id",
                "binds" => ":name, :cellphone, :file_name_image, :email, :id"     
            ],
       );

       parent::__construct("person", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}