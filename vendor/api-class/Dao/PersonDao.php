<?php

namespace Application\Dao;

use Application\Models\Person;
use Application\Database\Connection;
use Application\Database\Query;
use Application\Dao\Dao;

class PersonDao extends Dao
{
    public function __construct()
    {
       $keys = array(
            "all" => "name, date_register, file_name_image, email",
            "byKey" => "email",
            "insert" => [
                "columns" => "name, document, cellphone, file_name_image, email",
                "binds" => ":name, :document, :cellphone, :filenameimage, :email"
            ],
            "update" => [
                "query" => "name = :name, cellphone = :cellphone, file_name_image = :filenameimage, email = :email WHERE id = :id",
                "binds" => ":name, :cellphone, :filenameimage, :email, :id"     
            ],
       );

       parent::__construct("person", $keys);
    }
}