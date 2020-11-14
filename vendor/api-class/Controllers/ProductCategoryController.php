<?php

namespace Application\Controllers;

use Application\Dao\ProductCategoryDao;
use Application\Utilities;
use Application\Validator;

class ProductCategoryController
{
    private $productCategoryDao;
    private $validator;

    public function __construct()
    {
        $this->productCategoryDao = new ProductCategoryDao();
        $this->validator = new Validator();
    }

    public function getAll()
    {
        try {
            $values = $this->productCategoryDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há categoria cadastrada!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->productCategoryDao->getKeys()["insert"]["columns"]);
           
            $values = array($body["descricao"]);

            return Utilities::output($this->productCategoryDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->productCategoryDao->getKeys()["update"]["columns"]);
           
            $values = array(
                $body["descricao"],
                $body["id"],
                $body["deleted"]
            );

            return Utilities::output($this->productCategoryDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}