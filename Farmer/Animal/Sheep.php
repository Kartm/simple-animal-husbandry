<?php
namespace Farmer\Animal {
    class Sheep extends \Farmer\Animal\Animal
    {
        public function __construct()
        {
            $exchangeArray = array(Rabbit::class => (double)(6),
            Pig::class => (double)(1/2));
            parent::__construct($exchangeArray);
        }
    }
}
