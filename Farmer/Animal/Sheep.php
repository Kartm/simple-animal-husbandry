<?php
namespace Farmer\Animal {
    class Sheep extends \Farmer\Animal\Animal
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array((string)new \Farmer\Animal\Rabbit(false) => (double)(6),
                (string)new \Farmer\Animal\Pig(false) => (double)(1/2));
            }
        }
    }
}
