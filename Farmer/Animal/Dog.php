<?php
namespace Farmer\Animal {
    class Dog
    {
        public $exchangeArray = array();

        public function __construct()
        {
            $this -> exchangeArray = array("Sheep" => (double)(1));
        }
    }
}
