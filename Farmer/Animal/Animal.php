<?php
namespace Farmer\Animal {
    class Animal
    {    
        //todo should I create a boolean here? 
        protected function unqualifyArray($array) 
        {
            if($array === null) return $array;
            $result = array();
            foreach ($array as $key => $value) {
                $key = explode('\\', $key);
                $key = end($key);
                $value = explode('\\', $value);
                $value = end($value);
                $result[$key] = $value;
            }
            return $result;
        }

        public $exchangeArray = array();

        public function __construct($exchangeArray = null) 
        {
            $this -> exchangeArray = $this -> unqualifyArray($exchangeArray);
        }

        public function getName()
        {
            return $this -> __toString();
        }

        public function __toString() 
        {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}