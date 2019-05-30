<?php
namespace Farmer\Animal {
    class Cow  extends \Farmer\Animal\Animal
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array((string)new \Farmer\Animal\Pig(false) => (double)(3),
                (string)new \Farmer\Animal\Horse(false) => (double)(1/2),
                (string)new \Farmer\Animal\BigDog(false) => (double)(1));
            }
        }
    }
}
