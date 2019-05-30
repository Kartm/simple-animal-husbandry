<?php
namespace Farmer\Herd {
    class Herd
    {
        private $animals = [];

        private static function getAnimalName($object)
        {
            $temp = explode("\\", get_class($object));
            return array_pop($temp);
        }

        private function getAnimalAmount($animalObject)
        {
            $animalName = $this -> getAnimalName($animalObject);
            return isset($this -> animals[$animalName]) ? $this -> animals[$animalName] : 0;
        }

        private function removeAnimals($chosenObjectArray, $isRemovingChosen)
        {
            $oldAnimals = $this -> animals;
            if ($isRemovingChosen == true) { //* removing only chosen animals
                foreach (array_values($chosenObjectArray) as $chosen) {
                    $animalName = $this -> getAnimalName($chosen);
                    unset($this -> animals[$animalName]);
                }
            } else { //* removing everything except chosen animals
                $chosenArray = [];
                foreach (array_keys($chosenObjectArray) as $chosen) {
                    array_push($chosenArray, $this -> getAnimalName($chosenObjectArray[$chosen]));
                }
                

                foreach (array_keys($oldAnimals) as $animalName) {
                    if (in_array($animalName, $chosenArray) == false) {
                        unset($this -> animals[$animalName]);
                    }
                }
            }
        }

        private function setAnimalAmount($animalObject, $newAmount)
        {
            $animalName = $this -> getAnimalName($animalObject);
            $newAnimal = [$animalName => $newAmount];

            if ($newAmount == 0) {
                unset($this -> animals[$animalName]);
            } else {
                $this -> animals = array_merge($this -> animals, $newAnimal);
            }
        }

        public function addAnimals($animalObject, $amount)
        {
            $animalName = self::getAnimalName($animalObject);
            $oldValue = $this -> getAnimalAmount($animalObject);
            $newValue = $amount + $oldValue;

            if ($newValue == 0) {
                unset($this -> animals[$animalName]);
            } else {
                $newAnimal = [$animalName => $newValue];
                $this -> animals = array_merge($this -> animals, $newAnimal);
            }
        }

        public function reproduce($animal1Object, $animal2Object)
        {
            $animal1Name = $this -> getAnimalName($animal1Object);
            $animal2Name = $this -> getAnimalName($animal2Object);

            if (strcasecmp($animal1Name, $animal2Name) == 0) { //matching animals
                $this->addAnimals($animal1Object, 1);
            } else {
                $totalAnimal1Amount = $this -> getAnimalAmount($animal1Object) + 1;
                $totalAnimal2Amount = $this -> getAnimalAmount($animal2Object) + 1;

                $animal1Addition = floor($totalAnimal1Amount / 2);
                $animal2Addition = floor($totalAnimal2Amount / 2);

                $this -> addAnimals($animal1Object, $animal1Addition);
                $this -> addAnimals($animal2Object, $animal2Addition);
            }
            return;
        }

        public function exchange($animal1Object, $animal2Object)
        {
            $animal1Name = $this -> getAnimalName($animal1Object);
            $animal2Name = $this -> getAnimalName($animal2Object);

            $rate = $animal1Object -> exchangeArray[$animal2Name];

            $animal1Amount = $this -> getAnimalAmount($animal1Object);
            $animal2Amount = $this -> getAnimalAmount($animal2Object);

            if ($rate > 1) {
                $this -> setAnimalAmount($animal1Object, $animal1Amount - 1);
                $this -> addAnimals($animal2Object, $rate);
            } else {
                $rate = round(1/$rate);
                $this -> setAnimalAmount($animal1Object, $animal1Amount - $rate);
                $this -> addAnimals($animal2Object, 1);
            }
        }

        public function attack($animalObject)
        {
            $animalName = $this -> getAnimalName($animalObject);

            if (strcasecmp($animalName, "Fox") == 0) { //* lose all rabbits
                $dogObject = new \Farmer\Animal\Dog;
                $dogAmount = $this -> getAnimalAmount($dogObject);
                
                if ($dogAmount > 0) {
                    $this -> setAnimalAmount($dogObject, $dogAmount - 1);
                } else {
                    $this -> removeAnimals([new \Farmer\Animal\Rabbit], true);
                }
            } elseif (strcasecmp($animalName, "Wolf") == 0) { //* lose all animals except horses and small dogs
                $bigDogObject = new \Farmer\Animal\BigDog;
                $bigDogAmount = $this -> getAnimalAmount($bigDogObject);

                if ($bigDogAmount > 0) {
                    $this -> setAnimalAmount($bigDogObject, $bigDogAmount - 1);
                } else {
                    $this -> removeAnimals([new \Farmer\Animal\Horse, new \Farmer\Animal\Dog], false);
                }
            }
        }

        public function getAnimals()
        {
            return $this->animals;
        }
    }
}
