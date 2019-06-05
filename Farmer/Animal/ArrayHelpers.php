<?php
namespace Farmer {
    class ArrayHelpers
    {

    
        public static function unqualifyClassName($className)
        {
            $className = explode('\\', $className);
            return end($className);
        }

        public static function unqualifyArray($array)
        {
            $result = array();
            foreach ($array as $key => $value) {
                $key = self::unqualifyClassName($key);
                $value = self::unqualifyClassName($value);
                $result[$key] = $value;
            }
            return $result;
        }
    }
}
