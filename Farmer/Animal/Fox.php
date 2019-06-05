<?php
namespace Farmer\Animal {
    class Fox extends \Farmer\Animal\Predator
    {
        private $targetAnimals = array(\Farmer\Animal\Rabbit::class);
        public function __construct() 
        {
            parent::__construct($this -> targetAnimals);
        }
    }
}
