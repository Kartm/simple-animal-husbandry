<?php
namespace Farmer\Animal {
    class Predator extends Animal
    {
        private $targetAnimals = array();
        //todo are names intuitive?
        public function __construct($targetAnimals, $exchangeArray = null) 
        {
            $this -> targetAnimals = $this -> unqualifyArray($targetAnimals);
            parent::__construct($exchangeArray);
        }

        public function getTargetAnimals()
        {
            return $this -> targetAnimals;
        }
    }
}