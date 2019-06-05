<?php
namespace Farmer\Animal {
    use \Farmer\ClassHelpers;
    class Predator extends Animal
    {
        private $targetAnimals = array();

        public function __construct($targetAnimals) 
        {
            $this -> targetAnimals = ClassHelpers::unqualifyArray($targetAnimals);
            parent::__construct();
        }

        public function getTargetAnimals()
        {
            return $this -> targetAnimals;
        }
    }
}
