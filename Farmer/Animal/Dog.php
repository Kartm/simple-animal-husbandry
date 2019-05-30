<?php
namespace Farmer\Animal {
    class Dog extends Animal
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array((string)new \Farmer\Animal\Sheep(false) => (double)(1));
            }
        }
    }
}
