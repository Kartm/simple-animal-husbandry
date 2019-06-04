<?php
namespace Farmer\Animal {
    class Pig  extends \Farmer\Animal\Animal
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Sheep::class => (double)(2),
            \Farmer\Animal\Cow::class => (double)(1/3));
            parent::__construct($exchangeArray);
        }
    }
}
