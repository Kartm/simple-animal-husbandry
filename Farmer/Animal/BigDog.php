<?php
namespace Farmer\Animal {
    class BigDog extends \Farmer\Animal\Animal
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Cow::class => (double)(1));
            parent::__construct($exchangeArray);
        }
    }
}
