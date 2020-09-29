<?php

namespace Application\Controllers;

use Application\Dao\ProductImageDao;
use Application\Models\ProductImage;
use Application\Validator;
use Application\Utilities;

class ProductImageController
{
    private $productImageDao;
    private $validator;

    public function __construct()
    {
        $this->productImageDao = new ProductImageDao();
        $this->validator = new Validator();
    }

    public function getAll()
    {
        try {
            $values = $this->productImageDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há imagens cadastradas!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->productImageDao->getKeys()["insert"]["columns"]);
            
            $productImage = new ProductImage(null, $body["product_id"], $body["file_name_image"]);

            $values = array(
                $productImage->getProductId(),
                $productImage->getFileNameImage()
            );

            return Utilities::output($this->productImageDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {
        
            $this->validator->isValidFields($body, $this->productImageDao->getKeys()["update"]["columns"]);
            
            $productImage = new ProductImage($body["id"], $body["product_id"], $body["file_name_image"]);
            
            $values = array(
                $productImage->getProductId(),
                $productImage->getFileNameImage(),
                $productImage->getId()
            );

            return Utilities::output($this->productImageDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}