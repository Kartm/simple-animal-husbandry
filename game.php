<?php
    namespace Farmer\Animal {
        //usage: Animal\Rabbit
        class Rabbit {

        }

        class Pig {

        }

        class Sheep {

        }

        class Cow {

        }

        class Horse {

        }

        class Dog {

        }

        class BigDog {

        }

        class Fox {

        }

        class Wolf {

        }
    }

    /*
    1 sheep = 6 rabbits
    1 pig = 2 sheep
    1 cow = 3 pigs
    1 horse = 2 cows
    1 dog = 1 sheep
    1 bigdog = 1 cow
    */
    
    namespace Farmer\Herd {
        class Herd {
            private $animals = [];

            private function getClassName($object) {
                $temp = explode("\\", get_class($object));
                return array_pop($temp);
            }

            function addAnimals($animal, $amount) {
                $className = $this->getClassName($animal);
                $oldValue = isset($this->animals[$className]) ? $this->animals[$className] : 0;
                $newAnimal = [$className => $amount + $oldValue];
                $this->animals = array_merge($this->animals, $newAnimal);
            }
    
            function reproduce($animal1Object, $animal2Object) {
                $animal1 = $this->getClassName($animal1Object);
                $animal2 = $this->getClassName($animal2Object);
                if(strcasecmp($animal1, $animal2) == 0) { //match

                } else {

                }
                return;
            }
    
            function exchange($animal1, $animal2) {
    
            }
    
            function attack($animal) { //new Animal\Fox or new Animal\Wolf
    
            }
    
            function getAnimals() {
                return $this->animals;
            }
        }
    }

    namespace {
        use Farmer\Animal;
        use Farmer\Herd\Herd;

        
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Pig, 1);
        $herd->reproduce(new Animal\Rabbit, new Animal\Pig);
        var_dump($herd->getAnimals());
    }
?>