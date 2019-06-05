<?php
namespace Farmer\Animal {
    class Fox extends \Farmer\Animal\Predator
    {
        public function __construct()
        {
            $targetAnimals = array(Rabbit::class);
            parent::__construct($targetAnimals);
        }
    }
}
