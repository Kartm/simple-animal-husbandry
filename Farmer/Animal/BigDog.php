<?php
namespace Farmer\Animal {
    class BigDog
    {
        public $exchangeArray = array();
        public function __construct($initializeExchange = true) 
        {
            if($initializeExchange == true) {
                $this -> exchangeArray = array(spl_object_hash(new \Farmer\Animal\Cow(false)) => (double)(1));
            }
        }
    }
}
