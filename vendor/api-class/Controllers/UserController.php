<?php

namespace Application\Controllers;

use Application\Dao\UserDao;
use Application\Models\User;
use Application\Utilities;
use Application\Validator;

class UserController
{
    private $userDao;
    private $validator;

    public function __construct()
    {
        $this->userDao = new UserDao();
        $this->validator = new Validator();
    }

    public function getAll()
    {
        try {
            $values = $this->userDao->getAll();

            if(count($values) == 0) {
                return Utilities::output("Não há usuários cadastrados!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function getById(int $id):array
    {
        try {
            $values = $this->userDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Usuário não encontrado!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->userDao->getKeys()["insert"]["columns"]);
           
            $user = new User(null, $body["senha"], $body["admin"], $body["pessoa_id"]);

            $values = array(
                $user->getPassword(),
                $user->getAdmin(),
                $user->getIdPerson()
            );

            return Utilities::output($this->userDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->userDao->getKeys()["update"]["columns"]);
            
            $values = array(
                $body["senha"],
                $body["admin"],
                $body["pessoa_id"],
                $body["deleted"],
                $body["id"]
            );

            return Utilities::output($this->userDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}