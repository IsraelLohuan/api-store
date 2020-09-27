<?php

namespace Application\Controllers;

use Application\Dao\ProductDao;
use Application\Models\Product;
use Application\Utilities;
use Application\Validator;

class ProductController
{
    private $productDao;
    private $validator;

    public function __construct()
    {
        $this->productDao = new ProductDao();
        $this->validator = new Validator();
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
                return Utilities::output("Produto não encontrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->productDao->getKeys()["insert"]["columns"]);
           
            $product= new Product(null, $body["price"], $body["description"], $body["spotlight"], 0, $body["value_discount"], $body["male"], $body["product_category_id"], $body["title"]);

            $values = array(
                $product->getPrice(),
                $product->getDescription(),
                $product->getSpotlight(),
                $product->getValueDiscount(),
                $product->getMale(),
                $product->getProductCategoryId(),
                $product->getTitle()
            );

            return Utilities::output($this->productDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->productDao->getKeys()["update"]["columns"]);
           
            $product= new Product($body["id"], $body["price"], $body["description"], $body["spotlight"], $body["deleted"], $body["value_discount"], $body["male"], $body["product_category_id"], $body["title"]);
            
            $values = array(
                $product->getPrice(),
                $product->getDescription(),
                $product->getSpotlight(),
                $product->getDeleted(),
                $product->getValueDiscount(),
                $product->getMale(),
                $product->getProductCategoryId(),
                $product->getTitle(),
                $product->getId()
            );

            return Utilities::output($this->productDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}