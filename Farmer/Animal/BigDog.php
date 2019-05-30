<?php
namespace Farmer\Animal {
    class BigDog extends Animal
    {
        public $exchangeArray = array();
        public function __construct($initializeExchange = true) 
        {
            if($initializeExchange == true) {
                $this -> exchangeArray = array((string)new \Farmer\Animal\Cow(false) => (double)(1));
            }
        }
    }
}
