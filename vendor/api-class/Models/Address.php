<?php

namespace Application\Models;

class Address 
{
    private $id;
    private $street;
    private $publicPlace;
    private $uf;
    private $addresscol;
    private $neighborhood;
    private $cep;
    private $numberHouse;
    private $addressDescription;
    private $deleted;

    public function __construct($id, $street, $publicPlace, $uf, $addresscol, $neighborhood, $cep, $numberHouse, $addressDescription, $deleted)
    {
        $this->setId($id);
        $this->setStreet($street);
        $this->setPublicPlace($publicPlace);
        $this->setUf($uf);
        $this->setAddresscol($addresscol);
        $this->setNeighborhood($neighborhood);
        $this->setCep($cep);
        $this->setNumberHouse($numberHouse);
        $this->setAddressDescription($addressDescription);
        $this->setDeleted($deleted);
    }

    public function getId()
    {
		return $this->id;
	}

    public function setId($id)
    {
		$this->id = $id;
	}

    public function getStreet()
    {
		return $this->street;
	}

    public function setStreet($street)
    {
		$this->street = $street;
	}

    public function getPublicPlace()
    {
		return $this->publicPlace;
	}

    public function setPublicPlace($publicPlace)
    {
		$this->publicPlace = $publicPlace;
	}

    public function getUf()
    {
		return $this->uf;
	}

    public function setUf($uf)
    {
		$this->uf = $uf;
	}

    public function getAddresscol()
    {
		return $this->addresscol;
	}

    public function setAddresscol($addresscol)
    {
		$this->addresscol = $addresscol;
	}

	public function getNeighborhood(){
		return $this->neighborhood;
	}

    public function setNeighborhood($neighborhood)
    {
		$this->neighborhood = $neighborhood;
	}

    public function getCep()
    {
		return $this->cep;
	}

    public function setCep($cep)
    {
		$this->cep = $cep;
	}

    public function getNumberHouse()
    {
		return $this->numberHouse;
	}

    public function setNumberHouse($numberHouse)
    {
		$this->numberHouse = $numberHouse;
	}

    public function getAddressDescription()
    {
		return $this->AddressDescription;
	}

    public function setAddressDescription($AddressDescription)
    {
		$this->AddressDescription = $AddressDescription;
	}

    public function getDeleted()
    {
		return $this->deleted;
	}

    public function setDeleted($deleted)
    {
		$this->deleted = $deleted;
	}
}