<?php

namespace Application\Controllers;

use Application\Dao\PersonDao;

class PersonController 
{
    private $personDao;

    public function __construct()
    {
        $this->personDao = new PersonDao();
    }

    public function getAll()
    {
        echo json_encode($this->personDao->getAll());
    }
}