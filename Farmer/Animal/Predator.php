<?php
namespace Farmer\Animal {
    use \Farmer\ArrayHelpers;
    class Predator extends Animal
    {
        private $targetAnimals = array();

        public function __construct($targetAnimals) 
        {
            $this -> targetAnimals = ArrayHelpers::unqualifyArray($targetAnimals);
            parent::__construct();
        }

        public function getTargetAnimals()
        {
            return $this -> targetAnimals;
        }
    }
}
