<?php
namespace Farmer\Animal {
    use \Farmer\ArrayHelpers;
    class Watchdog extends Animal
    {
        public $defendAgainst = array();
        //todo are names intuitive?
        public function __construct($exchangeArray, $defendAgainst) 
        {
            $this -> defendAgainst = ArrayHelpers::unqualifyArray($defendAgainst);
            parent::__construct($exchangeArray);
        }
    }
}