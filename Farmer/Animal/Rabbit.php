<?php
namespace Farmer\Animal {
    class Rabbit extends \Farmer\Animal\Animal
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Sheep::class => (double)(1/6));
            parent::__construct($exchangeArray);
        }
    }
}
