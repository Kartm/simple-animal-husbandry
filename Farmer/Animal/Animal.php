<?php
namespace Farmer\Animal {
    class Animal
    {     
        protected function unqualifyArrayKeys($array) 
        {
            if($array === null) return $array;
            $result = array();
            foreach ($array as $key => $value) {
                $key = explode('\\', $key);
                $key = end($key);
                $result[$key] = $value;
            }
            return $result;
        }

        public $exchangeArray = array();

        public function __construct($exchangeArray = null) 
        {
            $this -> exchangeArray = $this -> unqualifyArrayKeys($exchangeArray);
        }

        public function __toString() 
        {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}