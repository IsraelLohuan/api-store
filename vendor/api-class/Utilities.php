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

    public static function getImageBase64($category, $filename) 
    {
       $filepath = $_SERVER['DOCUMENT_ROOT'] . "/api-store/images/" . $category . "/" . $filename;

       return base64_encode(file_get_contents($filepath));
    }

    public static function setBase64Json(&$array, $category) 
    {
        for($i = 0; $i < count($array); $i ++) {
            $array[$i]["base_64"] = Utilities::getImageBase64($category, $array[$i]["filename"]);
        }
    }
}