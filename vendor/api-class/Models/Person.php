<?php

namespace Application\Models;

class Person 
{
    private $id;
    private $name;
    private $dateRegister;
    private $document;
    private $cellphone;
    private $email;
    
    public function __construct($id, $name, $dateRegister, $document, $cellphone, $email) 
    {
        $this->setId($id);
        $this->setName($name);
        $this->setDateRegister($dateRegister);
        $this->setDocument($document);
        $this->setCellPhone($cellphone);
        $this->setEmail($email);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setDateRegister($data) {
        $this->dateRegister = $data;
    }

    public function getDateRegister() {
        return $this->dateRegister;
    }

    public function setDocument($document) {
        $this->document = $document;
    }

    public function getDocument() {
        return $this->document;
    }

    public function setCellPhone($phone) {
        $this->phone = $phone;
    }

    public function getCellPhone() {
        return $this->phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
}
