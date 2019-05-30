<?php
namespace Farmer\Animal {
    class Fox extends \Farmer\Animal\Animal
    {
        //* if there is a small dog, abort
        //* lose all rabbits
        public static function action($herd) { 
            if($herd -> getAnimalAmount(new Dog) > 0) {
                $herd -> addAnimals(new Dog, -1);
            } else {
                $toRemove = array(new Rabbit);
                foreach ($toRemove as $key => $value) {
                    $herd -> setAnimalAmount($value, 0);
                }
            }
            return $herd -> getAnimals();
        }
    }
}
