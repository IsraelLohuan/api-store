<?php

namespace Application\Dao;

use Application\Models\Person;
use Application\Database\Connection;
use Application\Database\Query;

class PersonDao extends Connection
{
    private $tableName = "person";
    private $query;

    public function __construct()
    {
        parent::__construct();

        $this->query = new Query($this->getConnection());
    }

    public function getAll():array
    {
        return $this->query->select("SELECT name, date_register, file_name_image, email FROM $this->tableName");
    }

    public function getByEmail(string $email) 
    {
        $sql = "SELECT * FROM $this->tableName WHERE email = '$email'";

        return $this->query->select($sql);
    }

    public function insert(Person $person)
    {
        $sql = "INSERT INTO $this->tableName (name, document, cellphone, file_name_image, email) VALUES (:name, :document, :cellphone, :filenameimage, :email)";

        $this->query->executeQuery($sql, array(
            ":name" => $person->getName(),
            ":document" => $person->getDocument(),   
            ":cellphone" => $person->getCellPhone(),
            ":filenameimage" => $person->getFileNameImage(),
            ":email" => $person->getEmail()
        ));

        return "Registro salvo com sucesso!";
    }

    public function update(Person $person, int $id)
    {
        $sql = "UPDATE $this->tableName set name = :name, cellphone = :cellphone, file_name_image = :filenameimage, email = :email WHERE id = :id";

        $this->query->executeQuery($sql, array(
            ":name" => $person->getName(), 
            ":cellphone" => $person->getCellPhone(),
            ":filenameimage" => $person->getFileNameImage(),
            ":email" => $person->getEmail(),
            ":id" => $id
        ));

        return "Registro atualizado com sucesso!";
    }
}