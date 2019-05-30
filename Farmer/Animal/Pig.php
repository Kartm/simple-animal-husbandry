<?php
namespace Farmer\Animal {
    class Pig
    {
        public $exchangeArray = array();

        public function __construct()
        {
            $this -> exchangeArray = array("Sheep" => (double)(2),
            "Cow" => (double)(1/3));
        }
    }
}
