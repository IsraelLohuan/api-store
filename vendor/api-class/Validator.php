<?php

namespace Application;

class Validator
{
    private $lengthFields = array(
        "email" => 64
    );

    public function isValidEmail(string $email)
    {
        if(strlen($email) > $this->lengthFields["email"]) {
            throw new \Exception("Quantidade de caracteres inválidos no campo email!");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email em formato inválido!");
        }
    }
}