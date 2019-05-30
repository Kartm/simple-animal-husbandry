<?php
namespace Farmer\Animal {
    class Fox extends \Farmer\Animal\Animal
    {
        //* if there is a small dog, abort and remove him
        //* lose all rabbits
        public static function action($herd) { 
            if($herd -> getAnimalAmount(new Dog) > 0) {
                var_dump("has a dog");
            }
            return $herd;
        }
    }
}
