<?php
namespace Farmer\Animal {
    class Wolf extends \Farmer\Animal\Animal
    {
        //* if there is a big dog, abort
        //* lose all animals except horses and small dogs
        public static function action($herd) { 
            if($herd -> getAnimalAmount(new BigDog) > 0) {
                $herd -> addAnimals(new BigDog, -1);
            } else {
                $toExclude = array(new Horse, new Dog);
                foreach ($herd -> getAnimals() as $key => $value) {
                    if(in_array($key, $toExclude) == false) {
                        $herd -> setAnimalAmount($key, 0);
                    }
                }
            }
            return $herd -> getAnimals();
        }
    }
}
