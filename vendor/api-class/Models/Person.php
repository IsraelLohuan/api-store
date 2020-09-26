<?php

namespace Application\Models;

class Person 
{
    private $id;
    private $name;
    private $dateRegister;
    private $document;
    private $cellphone;
    private $fileNameImage;
    private $email;
    
    public function __construct($id, $name, $document, $cellphone, $fileNameImage, $email, $dateRegister = "") 
    {
        $this->setId($id);
        $this->setName($name);
        $this->setDocument($document);
        $this->setCellPhone($cellphone);
        $this->setFileNameImage($fileNameImage);
        $this->setEmail($email);
        $this->setDateRegister($dateRegister);
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

    public function setFileNameImage($file) {
        $this->fileNameImage = $file;
    }

    public function getFileNameImage() {
        return $this->fileNameImage;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
}
