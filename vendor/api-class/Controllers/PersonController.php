<?php

namespace Application\Controllers;

use Application\Models\Person;
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

            $person = new Person(null, $body["name"], $body["document"], $body["cellphone"], $body["file_name_image"], $body["email"]);

            $this->validator->isValidEmail($person->getEmail());

            $values = array(
                $person->getName(),
                $person->getDocument(),
                $person->getCellphone(),
                $person->getFileNameImage(),
                $person->getEmail()
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

            $person = new Person($body["id"], $body["name"], $body["document"], $body["cellphone"], $body["file_name_image"], $body["email"]);
        
            $this->validator->isValidEmail($person->getEmail());

            $values = array(
                $person->getName(),
                $person->getCellphone(),
                $person->getFileNameImage(),
                $person->getEmail(),
                $person->getId()
            );

            return Utilities::output($this->personDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}