<?php
namespace Farmer\Animal {
    class BigDog extends \Farmer\Animal\Watchdog
    {
        public function __construct()
        {
            $exchangeArray = array(Cow::class => (double)(1));
            $defendAgainst = array(Wolf::class);
            parent::__construct($exchangeArray, $defendAgainst);
        }
    }
}
