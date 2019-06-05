<?php
namespace Farmer\Animal {
    class Cow  extends \Farmer\Animal\Animal
    {
        //todo make it more intuitive
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Pig::class => (double)(3),
            \Farmer\Animal\Horse::class => (double)(1/2),
            \Farmer\Animal\BigDog::class => (double)(1));
            parent::__construct($exchangeArray);
        }
    }
}
