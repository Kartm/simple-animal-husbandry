<?php
namespace Farmer\Animal {
    class Sheep
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array(spl_object_hash(new \Farmer\Animal\Rabbit(false)) => (double)(6));
            }
        }
    }
}
