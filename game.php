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

            private static function getAnimalName($object) {
                //todo fix this
                if(is_object($object)) { //! that's awful, but can't figure out how to fix this atm
                    $temp = explode("\\", get_class($object));
                    return array_pop($temp);
                } else return $object; //! remove this later
            }

            private function getAnimalAmount($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);
                return isset($this -> animals[$animalName]) ? $this -> animals[$animalName] : 0;
            }

            private function doesHaveAnimal($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);
                $amount = $this -> getAnimalAmount($animalName);
                return $amount > 0;
            }

            private function setAnimalAmount($animalObject, $newAmount) {
                $animalName = $this -> getAnimalName($animalObject);
                $newAnimal = [$animalName => $newAmount];
                $this -> animals = array_merge($this -> animals, $newAnimal);
            }

            function addAnimals($animalObject, $amount) {
                $animalName = self::getAnimalName($animalObject);
                $oldValue = $this -> getAnimalAmount($animalName);
                $newAnimal = [$animalName => $amount + $oldValue];
                $this -> animals = array_merge($this -> animals, $newAnimal);
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
    
            function attack($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);
                if(strcasecmp($animalName, "Fox") == 0) {
                    $dogObject = new \Farmer\Animal\Dog;
                    if($this -> doesHaveAnimal($dogObject) == true) {
                        $dogAmount = $this -> getAnimalAmount($dogObject);
                        $this -> setAnimalAmount($dogObject, $dogAmount - 1);
                    } else {
                        //todo lose all rabbits
                    }
                } else if (strcasecmp($animalName, "Wolf") == 0) {
                    $bigDogObject = new \Farmer\Animal\BigDog;
                    if($this -> doesHaveAnimal($bigDogObject) == true) {
                        $bigDogAmount = $this -> getAnimalAmount($bigDogObject);
                        $this -> setAnimalAmount($bigDogObject, $bigDogAmount - 1);
                    } else {
                        //todo lose all animals except horses and small dogs
                    }
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
        $herd->addAnimals(new Animal\Dog, 1);
        var_dump($herd->getAnimals());
        $herd -> attack(new Animal\Fox);
        //$herd->reproduce(new Animal\Rabbit, new Animal\Pig);
        var_dump($herd->getAnimals());
    }
?>