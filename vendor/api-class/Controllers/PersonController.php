<?php

namespace Application\Controllers;

use Application\Models\Person;
use Application\Dao\PersonDao;
use Application\Utilities;

class PersonController 
{
    private $personDao;

    public function __construct()
    {
        $this->personDao = new PersonDao();
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

    public function insert(Person $person)
    {
        try {
           
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

    public function update(Person $person, array $body)
    {
        try {

            if(!array_key_exists("id", $body)) {
                throw new \Exception("ID não inserido!");
            }

            $values = array(
                $person->getName(),
                $person->getCellphone(),
                $person->getFileNameImage(),
                $person->getEmail(),
                $body["id"]
            );

            return Utilities::output($this->personDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}