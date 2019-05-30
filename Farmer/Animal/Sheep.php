<?php
namespace Farmer\Animal {
    class Sheep
    {
        public $exchangeArray = array();

        public function __construct()
        {
            $this -> exchangeArray = array("Rabbit" => (double)(6),
            "Pig" => (double)(1/2),
            "Dog" => (double)(1));
        }
    }
}
