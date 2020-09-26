<?php

namespace Application;

class Utilities
{
    public static function output($result, int $statusCode = null):array
    {
        if($statusCode != null) {
            return array(
                "result" => $result,
                "code" => $statusCode
            );
        }

        return array("result" => $result);
    }

    public static function getStatusCode(array $values):int 
    {
        return array_key_exists("code", $values) ? $values["code"] : 200;
    }
}