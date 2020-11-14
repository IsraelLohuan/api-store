<?php

namespace Application\Controllers;

use Application\Dao\PersonDao;
use Application\Utilities;
use Application\Validator;

class PersonController 
{
    private $personDao;
    private $validator;

    public function __construct()
    {
        $this->personDao = new PersonDao();
        $this->validator = new Validator();
    }

    public function login($body)
    {
        try {

            $this->validator->isValidFields($body, "email, senha");
           
            $values = $this->personDao->login($body["email"], $body["senha"]);

            if(count($values) == 0) {
                return Utilities::output("Login inválido!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getAll():array
    {
        try {
            $values = $this->personDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há pessoas cadastradas!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getByEmail(string $email):array
    {
        try {
            $values = $this->personDao->getByKey($email);

            if(count($values) == 0) {
                return Utilities::output("Pessoa não encontrada!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->personDao->getKeys()["insert"]["columns"]);

            $this->validator->isValidEmail($body["email"]);
            $this->validateFieldsUnique($body, true);

            $values = array(
                $body["nome"], 
                $body["documento"], 
                $body["telefone"], 
                $body["file_name"], 
                $body["email"],
                $body["senha"],
                $body["admin"]
            );

            return Utilities::output($this->personDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {

            $this->validator->isValidFields($body, $this->personDao->getKeys()["update"]["columns"]);

            $this->validator->isValidEmail($body["email"]);
            $this->validateFieldsUnique($body, false);

            $values = array(
                $body["nome"], 
                $body["deleted"],
                $body["telefone"], 
                $body["file_name"], 
                $body["senha"],
                $body["admin"],
                $body["id"]
            );

            return Utilities::output($this->personDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function validateFieldsUnique(array $values, bool $validateDocument = true)
    {
        if($this->personDao->fieldExists("email", $values["email"], $values["id"] ?? -1))
        {
            throw new \Exception("Email informado já existente!");
        }

        if($validateDocument) 
        {
            if($this->personDao->fieldExists("documento", $values["documento"]))
            {
                throw new \Exception("Documento informado já existente!");
            }
        }
    }
}