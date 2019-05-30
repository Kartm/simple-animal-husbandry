<?php
namespace Farmer\Animal {
    class Pig  extends Animal
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array((string)new \Farmer\Animal\Sheep(false) => (double)(2),
                (string)new \Farmer\Animal\Cow(false) => (double)(1/3));
            }
        }
    }
}
