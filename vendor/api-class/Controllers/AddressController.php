<?php

namespace Application\Controllers;

use Application\Dao\AddressDao;
use Application\Utilities;
use Application\Validator;

class AddressController 
{
    private $addressDao;
    private $validator;

    public function __construct()
    {
        $this->addressDao = new AddressDao();
        $this->validator = new Validator();
    }

    public function getById($id):array
    {
        try {
            $values = $this->addressDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Endereço não encontrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getAll() 
    {
        try {

            $values = $this->addressDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há endereço cadastrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->addressDao->getKeys()["insert"]["columns"]);
            
            $values = array(
                $body["rua"], 
                $body["logradouro"], 
                $body["uf"], 
                $body["cidade"], 
                $body["bairro"],
                $body["cep"],
                $body["numero"],
                $body["descricao"],
                $body["id_pessoa"]
            );

            return Utilities::output($this->addressDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {

            $this->validator->isValidFields($body, $this->addressDao->getKeys()["update"]["columns"]);

            $values = array(
                $body["rua"], 
                $body["logradouro"], 
                $body["uf"], 
                $body["cidade"], 
                $body["bairro"], 
                $body["cep"],
                $body["numero"],
                $body["descricao"],
                $body["deleted"],
                $body["id_pessoa"],
                $body["id"]
            );

            return Utilities::output($this->addressDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}