<?php
namespace Farmer\Animal {
    class Animal
    {
        //todo move exchangeArray here        
        private function parseExchangeArray($exchangeArray) {
            $result = array();
            foreach ($exchangeArray as $key => $value) {
                $key = explode('\\', $key);
                $key = end($key);
                $result[$key] = $value;
            }
            return $result;
        }

        public $exchangeArray = array();

        public function __construct($exchangeArray = null) 
        {
            $this -> exchangeArray = $this -> parseExchangeArray($exchangeArray);
        }

        public function __toString() {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}