<?php
namespace Farmer\Animal {
    class Horse
    {
        public $exchangeArray = array();

        public function __construct()
        {
            $this -> exchangeArray = array("Cow" => (double)(2));
        }
    }
}
