<?php

namespace Application;

class Validator
{
    private $lengthFields = array(
        "email" => 64
    );

    /*
        Método responsável por validar email.
        arguments: 
            - email (Email para validar)
    */
    public function isValidEmail(string $email)
    {
        if(strlen($email) > $this->lengthFields["email"]) {
            throw new \Exception("Quantidade de caracteres inválidos no campo email!");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email em formato inválido!");
        }
    }

    /*
        Método responsável por validar os campos inseridos no body.

        arguments: 
            - body (Body enviado para requisição)
            - fields (Campos necessários para realizar a requisição com sucesso)
    */
    public function isValidFields(array $body, $fields)
    {
        if(count($body) == 0) {
            throw new \Exception("É necessário preencher o campo body!");
        }

        $fields = explode(',', $fields);

        foreach($fields as $key => $value)
        {
            if(!array_key_exists(trim($value), $body)) {
                throw new \Exception("Campo $value não inserido!");
            }
        }
    }
}