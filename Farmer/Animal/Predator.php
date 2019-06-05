<?php
namespace Farmer\Animal {
    class Predator extends Animal
    {
        private $targetAnimals = array();

        public function __construct($targetAnimals) 
        {
            $this -> targetAnimals = $this -> unqualifyArray($targetAnimals);
            parent::__construct();
        }

        public function getTargetAnimals()
        {
            return $this -> targetAnimals;
        }
    }
}
