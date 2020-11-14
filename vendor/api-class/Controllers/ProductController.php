<?php

namespace Application\Controllers;

use Application\Dao\ProductDao;
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
                return Utilities::output("Não há produtos cadastrado!", 204);
            } 

            Utilities::setBase64Json($values, "produtos");

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
           
            $values = array(
                $body["preco"], 
                $body["descricao"], 
                $body["destaque"], 
                $body["desconto"],
                $body["masculino"],
                $body["produto_categoria_id"],
                $body["titulo"],
                $body["filename"],
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
           
            $values = array(
                $body["id"], 
                $body["preco"], 
                $body["descricao"], 
                $body["destaque"], 
                $body["deleted"], 
                $body["desconto"], 
                $body["masculino"], 
                $body["produto_categoria_id"], 
                $body["titulo"],
                $body["filename"],
            );

            return Utilities::output($this->productDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}