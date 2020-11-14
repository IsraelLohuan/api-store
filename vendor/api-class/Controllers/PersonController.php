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

            $person = new Person(
                null, 
                $body["nome"], 
                $body["documento"], 
                $body["telefone"], 
                $body["file_name"], 
                $body["email"]
            );

            $this->validator->isValidEmail($person->getEmail());
            $this->validateFieldsUnique($person);

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

            $person = new Person(
                $body["id"], 
                $body["nome"], 
                null, 
                $body["telefone"], 
                $body["file_name"], 
                $body["email"]
            );
        
            $this->validator->isValidEmail($person->getEmail());
            $this->validateFieldsUnique($person, false);

            $values = array(
                $person->getName(),
                $person->getCellphone(),
                $body["deleted"],
                $person->getFileNameImage(),
                $person->getEmail(),
                $person->getId()
            );

            return Utilities::output($this->personDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function validateFieldsUnique(Person $person, bool $validateDocument = true)
    {
        if($this->personDao->fieldExists("email", $person->getEmail(), $person->getId() ?? -1))
        {
            throw new \Exception("Email informado já existente!");
        }

        if($validateDocument) 
        {
            if($this->personDao->fieldExists("document", $person->getDocument()))
            {
                throw new \Exception("Documento informado já existente!");
            }
        }
    }
}