<?php
namespace Farmer\Animal {
    class Dog extends \Farmer\Animal\Watchdog
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Sheep::class => (double)(1));
            $defendAgainst = array(\Farmer\Animal\Fox::class);
            parent::__construct($exchangeArray, $defendAgainst);
        }
    }
}
