<?php
namespace Farmer\Animal {
    class Predator extends Animal
    {
        public $targetAnimals = array();
        //todo are names intuitive?
        public function __construct($targetAnimals, $exchangeArray = null) 
        {
            $this -> targetAnimals = $this -> unqualifyArrayKeys($targetAnimals);
            parent::__construct($exchangeArray);
        }
    }
}