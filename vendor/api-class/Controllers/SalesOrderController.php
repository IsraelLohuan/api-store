<?php

namespace Application\Controllers;

use Application\Dao\SalesOrderDao;
use Application\Controllers\ItemOrderController;
use Application\Utilities;
use Application\Validator;

class SalesOrderController
{
    private $salesOrderDao;
    private $validator;

    public function __construct()
    {
        $this->salesOrderDao = new SalesOrderDao();
        $this->validator = new Validator();
    }

    public function getAll()
    {
        try {
            $values = $this->salesOrderDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há pedido de venda cadastrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getById(int $id):array
    {
        try {
            $values = $this->salesOrderDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Pedido de venda não encontrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {

            if(!isset($body["items"])) {
                throw new \Exception("Necessário ter itens no pedido!");
            }

            $this->validator->isValidFields($body, $this->salesOrderDao->getKeys()["insert"]["columns"]);

            $values = array(
                $body["preco"],
                $body["id_pessoa"],
                $body["status_pedido_id"],
                $body["endereco_id"]
            );

            $idOrder = $this->salesOrderDao->insert($values, true);

            $this->insertItemsOrder($body["items"], $idOrder);

            return Utilities::output("Registro salvo com sucesso!");

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    private function insertItemsOrder(array $body, $idOrder) {
        $itemOrderController = new ItemOrderController();

        foreach($body as $key => $value) {
            $body[$key]["id_pedido"] = $idOrder;
            $itemOrderController->insert($body[$key]);
        }
    }

    public function update(array $body)
    {
        try {
           
            if(!isset($body["items"])) {
                throw new \Exception("Necessário ter itens no pedido!");
            }

            $this->validator->isValidFields($body, $this->salesOrderDao->getKeys()["update"]["columns"]);
            
            $values = array(
                $body["preco"],
                $body["id_pessoa"], 
                $body["status_pedido_id"],
                $body["endereco_id"],
                $body["deleted"],
                $body["id"]
            );

            return Utilities::output($this->salesOrderDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}