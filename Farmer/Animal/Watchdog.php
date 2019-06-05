<?php
namespace Farmer\Animal {
    use \Farmer\ArrayHelpers;
    class Watchdog extends Animal
    {
        private $defendAgainst = array();
        public function __construct($exchangeArray, $defendAgainst) 
        {
            $this -> defendAgainst = ArrayHelpers::unqualifyArray($defendAgainst);
            parent::__construct($exchangeArray);
        }

        public function getDefendAgainst()
        {
            return $this -> defendAgainst;
        }
    }
}