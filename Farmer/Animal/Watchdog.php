<?php
namespace Farmer\Animal {
    class Watchdog extends Animal
    {
        public $defendAgainst = array();
        //todo are names intuitive?
        public function __construct($exchangeArray, $defendAgainst) 
        {
            $this -> defendAgainst = $this -> unqualifyArray($defendAgainst);
            parent::__construct($exchangeArray);
        }
    }
}