<?php
namespace Farmer\Animal {
    class Cow
    {
        public $exchangeArray = array();

        public function __construct()
        {
            $this -> exchangeArray = array("Pig" => (double)(3),
            "Horse" => (double)(1/2),
            "BigDog" => (double)(1));
        }
    }
}
