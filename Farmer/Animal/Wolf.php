<?php
namespace Farmer\Animal {
    class Wolf extends \Farmer\Animal\Predator
    {
        public function __construct()
        {
            $targetAnimals = array(BigDog::class,
            Cow::class,
            Pig::class,
            Rabbit::class,
            Sheep::class,
            );
            parent::__construct($targetAnimals);
        }
    }
}
