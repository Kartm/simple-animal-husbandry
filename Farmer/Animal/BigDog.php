<?php
namespace Farmer\Animal {
    class BigDog extends \Farmer\Animal\Watchdog
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Cow::class => (double)(1));
            $defendAgainst = array(\Farmer\Animal\Wolf::class);
            parent::__construct($exchangeArray, $defendAgainst);
        }
    }
}
