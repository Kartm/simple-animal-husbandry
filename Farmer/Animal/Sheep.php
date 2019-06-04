<?php
namespace Farmer\Animal {
    class Sheep extends \Farmer\Animal\Animal
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Rabbit::class => (double)(6),
            \Farmer\Animal\Pig::class => (double)(1/2));
            parent::__construct($exchangeArray);
        }
    }
}
