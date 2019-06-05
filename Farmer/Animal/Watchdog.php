<?php
namespace Farmer\Animal {
    use \Farmer\ClassHelpers;
    class Watchdog extends Animal
    {
        public $defendAgainst = array();
        //todo are names intuitive?
        public function __construct($exchangeArray, $defendAgainst) 
        {
            $this -> defendAgainst = ClassHelpers::unqualifyArray($defendAgainst);
            parent::__construct($exchangeArray);
        }
    }
}