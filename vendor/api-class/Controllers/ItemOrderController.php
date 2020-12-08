<?php

namespace Application\Controllers;

use Application\Dao\ItemOrderDao;
use Application\Utilities;
use Application\Validator;

class ItemOrderController
{
    private $itemOrderDao;
    private $validator;

    public function __construct()
    {
        $this->itemOrderDao = new ItemOrderDao();
        $this->validator = new Validator();
    }

    public function getItemsOrder($idOrder) {
        return $this->itemOrderDao->getItemsOrder($idOrder);
    }

    public function getAll():array
    {
        try {
            $values = $this->itemOrderDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há pessoas cadastradas!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getById($id):array
    {
        try {
            $values = $this->itemOrderDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Item não encontrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {

            $this->validator->isValidFields($body, $this->itemOrderDao->getKeys()["insert"]["columns"]);
         
            $values = array(
                $body["id_produto"],
                $body["id_pedido"],
                $body["quantidade"],
                $body["preco"],
                $body["desconto"]
            );

            return Utilities::output($this->itemOrderDao->insert($values)); 
            
        } catch(\Exception $e) {
           return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {

            $this->validator->isValidFields($body, $this->itemOrderDao->getKeys()["update"]["columns"]);

            $values = array(
                $body["id_produto"],
                $body["id_pedido"],
                $body["deleted"],
                $body["id"],
                $body["quantidade"],
                $body["preco"],
                $body["desconto"]
            );

            return Utilities::output($this->itemOrderDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}