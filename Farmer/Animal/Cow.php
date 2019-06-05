<?php
namespace Farmer\Animal {
    class Cow extends \Farmer\Animal\Animal
    {
        public function __construct()
        {
            $exchangeArray = array(Pig::class => (double)(3),
            Horse::class => (double)(1/2),
            BigDog::class => (double)(1));
            parent::__construct($exchangeArray);
        }
    }
}
