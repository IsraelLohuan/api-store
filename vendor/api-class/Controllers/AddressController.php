<?php

namespace Application\Controllers;

use Application\Models\Person;
use Application\Dao\AddressDao;
use Application\Utilities;
use Application\Validator;

class AddressController 
{
    private $addressDao;
    private $validator;

    public function __construct()
    {
        $this->addressDao = new AddressDao();
        $this->validator = new Validator();
    }

    public function getById($id):array
    {
        try {
            $values = $this->addressDao->getByKey($id);

            if(count($values) == 0) {
                return Utilities::output("Endereço não encontrada!", 204);
            } 

            return Utilities::output($values);

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function insert(array $body)
    {
        try {
           
            $this->validator->isValidFields($body, $this->addressDao->getKeys()["insert"]["columns"]);
            
            $address = new Address(
                null, 
                $body["street"], 
                $body["public_place"], 
                $body["uf"], 
                $body["addresscol"], 
                $body["neighborhood"],
                $body["cep"],
                $body["number_house"],
                $body["address_description"]
            );

            $values = array(
                $address->getStreet(),
                $address->getPublicPlace(),
                $address->getUf(),
                $address->getAddressCol(),
                $address->getNeighborhood(),
                $address->getCep(),
                $address->getNumberHouse(),
                $address->AddressDescription()
            );

            return Utilities::output($this->addressDao->insert($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }

    public function update(array $body)
    {
        try {

            $this->validator->isValidFields($body, $this->addressDao->getKeys()["update"]["columns"]);

            $address = new Address(
                $body["id"], 
                $body["street"], 
                $body["public_place"], 
                $body["uf"], 
                $body["addresscol"], 
                $body["neighborhood"],
                $body["cep"],
                $body["number_house"],
                $body["address_description"],
                $body["deleted"]
            );
            
            $values = array(
                $address->getId(),
                $address->getStreet(),
                $address->getPublicPlace(),
                $address->getUf(),
                $address->getAddrescol(),
                $address->getNeighborhood(),
                $address->getCep(),
                $address->getNumberHouse(),
                $address->getAddressDescription(),
                $address->getDeleted(),
                $address->getId()
            );

            return Utilities::output($this->addressDao->update($values));

        } catch(\Exception $e) {
            return Utilities::output($e->getMessage(), 404);
        }
    }
}