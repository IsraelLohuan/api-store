<?php

namespace Application\Models;

class SalesOrder 
{
    private $id;
    private $price;
    private $dataRegister;
    private $personId;
    private $statusOrderId;
    private $addressId;

    public function __construct($id, $price, $dataRegister, $personId, $statusOrderId, $addressId)
    {
        $this->setId($id);
        $this->setPrice($price);
        $this->setDataRegister($dataRegister);
        $this->setPersonId($personId);
        $this->setStatusOrderId($statusOrderId);
        $this->setAddressId($addressId);
    }

    public function getId()
    {
		return $this->id;
	}

    public function setId($id)
    {
		$this->id = $id;
	}

    public function getPrice()
    {
		return $this->price;
	}

    public function setPrice($price)
    {
		$this->price = $price;
	}

    public function getDataRegister()
    {
		return $this->dataRegister;
	}

    public function setDataRegister($dataRegister)
    {
		$this->dataRegister = $dataRegister;
	}

    public function getPersonId()
    {
		return $this->personId;
	}

    public function setPersonId($personId)
    {
		$this->personId = $personId;
	}

    public function getStatusOrderId()
    {
		return $this->statusOrderId;
	}

    public function setStatusOrderId($statusOrderId)
    {
		$this->statusOrderId = $statusOrderId;
	}

    public function getAddressId()
    {
		return $this->addressId;
	}

    public function setAddressId($addressId)
    {
		$this->addressId = $addressId;
	}
}