<?php
namespace Farmer\Animal {
    class Wolf extends \Farmer\Animal\Predator
    {
        //todo every animal except Horse and Dog
        private $targetAnimals = array(\Farmer\Animal\BigDog::class,
        \Farmer\Animal\Cow::class,
        \Farmer\Animal\Pig::class,
        \Farmer\Animal\Rabbit::class,
        \Farmer\Animal\Sheep::class,
        );

        public function __construct() 
        {
            parent::__construct($this -> targetAnimals);
        }
    }
}
