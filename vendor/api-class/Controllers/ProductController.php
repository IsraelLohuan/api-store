<?php

namespace Application\Controllers;

use Application\Dao\ProductDao;
use Application\Utilities;

class ProductController
{
    private $productDao;

    public function __construct()
    {
        $this->productDao = new ProductDao();
    }

    public function getAll()
    {
        try {
            $values = $this->productDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há produtos cadastrados!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getById(int $id):array
    {
        try {
            $values = $this->productDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Produto não encontrada!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

}