<?php
namespace Farmer\Animal {
    class Dog extends \Farmer\Animal\Animal
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Sheep::class => (double)(1));
            parent::__construct($exchangeArray);
        }
    }
}
