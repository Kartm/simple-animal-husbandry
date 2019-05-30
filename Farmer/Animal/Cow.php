<?php
namespace Farmer\Animal {
    class Cow
    {
        public $exchangeArray = array();

        public function __construct($initializeExchange = true) 
        {
            if ($initializeExchange == true) {
                $this -> exchangeArray = array(spl_object_hash(new \Farmer\Animal\Pig(false)) => (double)(3),
                spl_object_hash(new \Farmer\Animal\Horse(false)) => (double)(1/2),
                spl_object_hash(new \Farmer\Animal\BigDog(false)) => (double)(1));
            }
        }
    }
}
