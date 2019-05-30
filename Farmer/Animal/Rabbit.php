<?php
namespace Farmer\Animal {
    class Rabbit
    {
        public $exchangeArray = array();

        public function __construct()
        {
            $this -> exchangeArray = array("Sheep" => (double)(1/6));
        }
    }
}
