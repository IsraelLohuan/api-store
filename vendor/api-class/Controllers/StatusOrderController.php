<?php

namespace Application\Controllers;

use Application\Dao\StatusOrderDao;
use Application\Utilities;
use Application\Validator;

class StatusOrderController
{
    private $statusOrderDao;
    private $validator;

    public function __construct()
    {
        $this->statusOrderDao = new statusOrderDao();
        $this->validator = new Validator();
    }

    public function getAll()
    {
        try {
            $values = $this->statusOrderDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há status de venda cadastrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getById(int $id):array
    {
        try {
            $values = $this->statusOrderDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Status não encontrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->statusOrderDao->getKeys()["insert"]["columns"]);
            
            $values = array($body["status"]);

            return Utilities::output($this->statusOrderDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->statusOrderDao->getKeys()["update"]["columns"]);
            
            $values = array(
                $body["id"],
                $body["status"],
                $body["deleted"]
            );

            return Utilities::output($this->statusOrderDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}