<?php
namespace Farmer\Animal {
    class Rabbit
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array(spl_object_hash(new \Farmer\Animal\Sheep(false)) => (double)(1/6));
            }
        }
    }
}
