<?php
namespace Farmer\Animal {
    class Dog
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array(spl_object_hash(new \Farmer\Animal\Sheep(false)) => (double)(1));
            }
        }
    }
}
