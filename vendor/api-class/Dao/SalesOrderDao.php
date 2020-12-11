<?php

namespace Application\Dao;

use Application\Dao\Dao;

class SalesOrderDao extends Dao
{
    private $keys;

    public function __construct()
    {
       $this->keys = array(
            "all" => "*",
            "byKey" => "id",
            "insert" => [
                "columns" => "valor_total, id_pessoa, status_pedido_id, endereco_id",
                "binds" => ":valor_total, :id_pessoa, :status_pedido_id, :endereco_id"
            ],
            "update" => [
                "columns" => "id, valor_total, id_pessoa, status_pedido_id, endereco_id, deleted",
                "query" => "
                    valor_total = :valor_total,
                    id_pessoa = :id_pessoa,
                    status_pedido_id = :status_pedido_id,
                    endereco_id = :endereco_id,
                    deleted = :deleted
                    WHERE id = :id",
                "binds" =>  ":valor_total, :id_pessoa, :status_pedido_id, :endereco_id, :deleted, :id"     
            ],
       );

       parent::__construct("pedido", $this->keys);
    }

    public function getKeys() 
    {
        return $this->keys;
    }

    public function getAll():array
    {
        $sql = "select p.id, p.status_pedido_id, p.valor_total, p.data_cadastro, p.id_pessoa, p.endereco_id, p.deleted, pes.nome as cliente,
                ps.status
                from pedido as p INNER JOIN pedido_status as ps
                INNER JOIN pessoa as pes
                ON p.status_pedido_id = ps.id and p.id_pessoa = pes.id WHERE p.deleted = 0";

        return $this->query->select($sql);
    }

    public function getByKey($key) 
    {
        $sql = "select p.id, p.status_pedido_id, p.valor_total, p.data_cadastro, p.id_pessoa, p.endereco_id, p.deleted, pes.nome as cliente,
                pes.email,
                ps.status
                from pedido as p INNER JOIN pedido_status as ps
                INNER JOIN pessoa as pes
                ON p.status_pedido_id = ps.id and p.id_pessoa = pes.id WHERE p.id = $key and p.deleted = 0";

        return $this->query->select($sql);
    }
}