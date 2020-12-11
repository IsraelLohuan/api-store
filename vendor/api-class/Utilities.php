<?php

namespace Application;

class Utilities
{
    public static function output($result, int $statusCode = null):array
    {
        if($statusCode != null) {
            return array(
                "message" => $result,
                "code" => $statusCode
            );
        }

        if(!is_array($result)) {
            return array(
                "message" => $result
            );
        }

        return $result;
    }

    public static function getStatusCode(array $values):int 
    {
        return array_key_exists("code", $values) ? $values["code"] : 200;
    }
}