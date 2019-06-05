<?php
namespace Farmer\Animal {
    class Dog extends \Farmer\Animal\Watchdog
    {
        public function __construct()
        {
            $exchangeArray = array(Sheep::class => (double)(1));
            $defendAgainst = array(Fox::class);
            parent::__construct($exchangeArray, $defendAgainst);
        }
    }
}
