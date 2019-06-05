<?php
namespace Farmer\Animal {
    class Fox extends \Farmer\Animal\Predator
    {
        public $targetAnimals = array(\Farmer\Animal\Rabbit::class);
        public function __construct() 
        {
            parent::__construct($this -> targetAnimals);
        }

    }
}
