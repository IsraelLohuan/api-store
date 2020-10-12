<?php

namespace Application\Dao;

use Application\Dao\Dao;

class AddressDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "id, street, public_place, uf, addresscol, neighborhood, cep, number_house, address_description, deleted",
            "byKey" => "id",
            "insert" => [
                "columns" => "street, public_place, uf, addresscol, neighborhood, cep, number_house, address_description",
                "binds" => ":street, :public_place, :uf, :addresscol, :neighborhood, :cep, :number_house, :address_description"
            ],
            "update" => [
                "columns" => "street, public_place, uf, addresscol, neighborhood, cep, number_house, address_description, deleted, id",
                "query" => "street = :street, public_place = :public_place, uf = :uf, addresscol = :addresscol, neighborhood = :neighborhood, cep = :cep, number_house = :number_house, address_description = :address_description, deleted = :deleted WHERE id = :id",
                "binds" => ":street, :public_place, :uf, :addresscol, :neighborhood, :cep, :number_house, :address_description, :deleted, :id"     
            ],
       );

       parent::__construct("address", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}