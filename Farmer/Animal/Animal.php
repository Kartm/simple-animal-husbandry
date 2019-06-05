<?php
namespace Farmer\Animal {
    use \Farmer\ArrayHelpers;
    class Animal
    {    
        public $exchangeArray = array();
        public $reproductionArray = array();

        public function __construct($exchangeArray = array(), $additionalReproductionArray = array()) 
        {
            $this -> exchangeArray = ArrayHelpers::unqualifyArray($exchangeArray);
            $reproductionArray = array(get_class($this) => 1);
            $reproductionArray = array_merge($reproductionArray, $additionalReproductionArray);
            $this -> reproductionArray = ArrayHelpers::unqualifyArray($reproductionArray);
        }

        public function __toString() 
        {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}