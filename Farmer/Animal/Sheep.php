<?php
namespace Farmer\Animal {
    class Sheep extends Animal
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array(new \Farmer\Animal\Rabbit(false) => (double)(6));
            }
        }
    }
}
