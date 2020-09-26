<?php

namespace Application\Controllers;

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
}