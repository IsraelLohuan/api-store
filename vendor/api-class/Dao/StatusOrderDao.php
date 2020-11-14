<?php

namespace Application\Dao;

class StatusOrderDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "status",
                "binds" => ":status"
            ],
            "update" => [
                "columns" => "id, status, deleted",
                "query" => "
                    status = :status,
                    deleted = :deleted,
                    WHERE id = :id",
                "binds" =>   ":id, :status"     
            ],
       );

       parent::__construct("pedido_status", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }
}
