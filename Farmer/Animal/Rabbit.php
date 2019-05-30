<?php
namespace Farmer\Animal {
    class Rabbit extends Animal
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array((string)new \Farmer\Animal\Sheep(false) => (double)(1/6));
            }
        }
    }
}
