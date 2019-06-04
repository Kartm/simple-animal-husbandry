<?php
namespace Farmer\Animal {
    class Horse  extends \Farmer\Animal\Animal
    {
        public function __construct() 
        {
            $exchangeArray = array(\Farmer\Animal\Cow::class => (double)(2));
            parent::__construct($exchangeArray);
        }
    }
}
