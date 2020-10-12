<?php

namespace Application\Controllers;

use Application\Models\Person;
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
         
            $item = new ItemOrder(
                null,
                $body["product_id"],
                $body["sale_order_id"],     
            );

            $values = array(
                $this->getProductId(),
                $this->getSaleOrderId()
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

            $item = new ItemOrder(
               $body["product_id"],
               $body["sale_order_id"],
               $body["deleted"],
               $body["id"],
            );
        
            $values = array(
                $item->getProductId(),
                $item->getSaleOrderId(),
                $item->getDeleted(),
                $item->getId()
            );

            return Utilities::output($this->itemOrderDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}