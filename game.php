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

            private function getAnimalName($object) {
                $temp = explode("\\", get_class($object));
                return array_pop($temp);
            }

            private function getAnimalAmount($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);
                return isset($this -> animals[$animalName]) ? $this -> animals[$animalName] : 0;
            }

            private function doesHaveAnimal($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);
                $amount = $this -> getAnimalAmount($className);
                return $amount > 0;
            }

            function addAnimals($animalObject, $amount) {
                $animalName = $this->getAnimalName($animalObject);
                $oldValue = $this->getAnimalAmount($animalName);
                $newAnimal = [$animalName => $amount + $oldValue];
                $this->animals = array_merge($this->animals, $newAnimal);
            }
    
            function reproduce($animal1Object, $animal2Object) {
                $animal1Name = $this->getAnimalName($animal1Object);
                $animal2Name = $this->getAnimalName($animal2Object);
                if(strcasecmp($animal1Name, $animal2Name) == 0) { //matching animals
                    //? how many animals does the player get if he has some animals? e.g. 3 pigs in the herd and 2 on the dices
                    $this->addAnimals($animal1Object, 1);
                } else {
                    $totalAnimal1Amount = $this->getAnimalAmount($animal1Object) + 1;
                    $totalAnimal2Amount = $this->getAnimalAmount($animal2Object) + 1;

                    $animal1Addition = floor($totalAnimal1Amount / 2);
                    $animal2Addition = floor($totalAnimal2Amount / 2);

                    $this -> addAnimals($animal1Object, $animal1Addition);
                    $this -> addAnimals($animal2Object, $animal2Addition);
                }
                return;
            }
    
            function exchange($animal1Object, $animal2Object) {
    
            }
    
            function attack($animalObject) { //new Animal\Fox or new Animal\Wolf
                $animalName = $this -> getAnimalName($animalObject);
                if(strcasecmp($animalName, "Fox") == 0) { //lose all rabbits
                    //todo abort if player has a small dog, then remove him
                } else if (strcasecmp($animalName, "Wolf") == 0) { //lose all animals except horses and small dogs
                    //todo abort if player has a big dog, then remove him
                }
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
        //var_dump($herd->doesHaveAnimal(new Animal\Pig));
        //var_dump($herd->getAnimals());
    }
?>