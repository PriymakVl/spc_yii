<?php

namespace app\helpers;

class Helper {
	
	public static function  callMethods( array $array, array $methods) 
    {
        foreach ($array as $object)
        {
            self::callMethod($object, $methods);
        }
        return $array;
    }

    public static function callMethod($object, $methods)
    {
        foreach ($methods as $method_name) {
            $object->$method_name();
        }
        return $object;
    }
}