<?php

namespace Application\Models;

class User
{
    private $id;
    private $password;
    private $admin;
    private $idPerson;

    public function __construct($id, $password, $admin, $idPerson)
    {
        $this->setId($id);
        $this->setPassword($password);
        $this->setAdmin($admin);
        $this->setIdPerson($idPerson);
    }

    public function getId()
    {
		  return $this->id;
	  }

    public function setId($id)
    {
		  $this->id = $id;
	  }

    public function getPassword()
    {
		  return $this->password;
	  }

    public function setPassword($password)
    {
		  $this->password = $password;
	  }

    public function getAdmin()
    {
		  return $this->admin;
	  }

    public function setAdmin($admin)
    {
		  $this->admin = $admin;
	  }

    public function getIdPerson()
    {
		  return $this->idPerson;
	  }

    public function setIdPerson($idPerson)
    {
		  $this->idPerson = $idPerson;
	  }
}