<?php
namespace Farmer\Animal {
    class Animal
    {    
        public $exchangeArray = array();
        public $reproductionArray = array();

        protected function unqualifyClassName($className) {
            $className = explode('\\', $className);
            return end($className);
        }

        protected function unqualifyArray($array) 
        {
            $result = array();
            foreach ($array as $key => $value) {
                $key = $this -> unqualifyClassName($key);
                $value = $this -> unqualifyClassName($value);
                $result[$key] = $value;
            }
            return $result;
        }

        public function __construct($exchangeArray = array(), $additionalReproductionArray = array()) 
        {
            $this -> exchangeArray = $this -> unqualifyArray($exchangeArray);
            $reproductionArray = array(get_class($this) => 1);
            $reproductionArray = array_merge($reproductionArray, $additionalReproductionArray);
            $this -> reproductionArray = $this -> unqualifyArray($reproductionArray);
        }

        public function __toString() 
        {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}