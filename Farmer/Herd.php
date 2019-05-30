<?php
namespace Farmer\Herd {
    class Herd
    {
        private $animals = [];

        private function getAnimalAmount($animal)
        {
            $animalHash = spl_object_hash($animal);
            return isset($this -> animals[$animalHash]) ? $this -> animals[$animalHash] : 0;
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

        private function setAnimalAmount($animal, $newAmount)
        {
            $animalHash = spl_object_hash($animal);
            $newAnimal = [$animalHash => $newAmount];

            if ($newAmount == 0) {
                unset($this -> animals[$animalHash]);
            } else {
                $this -> animals = array_merge($this -> animals, $newAnimal);
            }
        }

        public function addAnimals($animal, $amount)
        {
            $animalHash = spl_object_hash($animal);
            $oldValue = $this -> getAnimalAmount($animal);
            $newValue = $amount + $oldValue;

            if ($newValue == 0) {
                unset($this -> animals[$animalHash]);
            } else {
                $newAnimal = [$animalHash => $newValue];
                $this -> animals = array_merge($this -> animals, $newAnimal);
            }
        }

        public function reproduce($animal1, $animal2)
        {
            if (strcasecmp(spl_object_hash($animal1), spl_object_hash($animal2)) == 0) { //matching animals
                $this->addAnimals($animal1, 1);
            } else {
                $totalAnimal1Amount = $this -> getAnimalAmount($animal1) + 1;
                $totalAnimal2Amount = $this -> getAnimalAmount($animal2) + 1;

                $animal1Addition = (int)floor($totalAnimal1Amount / 2);
                $animal2Addition = (int)floor($totalAnimal2Amount / 2);

                $this -> addAnimals($animal1, $animal1Addition);
                $this -> addAnimals($animal2, $animal2Addition);
            }
            return;
        }

        public function exchange($animal1, $animal2)
        {
            $rate = $animal1 -> exchangeArray[spl_object_hash($animal2)];

            if ($rate >= (double)(1)) {
                $rate = (int)$rate;
                $this -> addAnimals($animal1, -1);
                $this -> addAnimals($animal2, $rate);
            } else {
                $rate = (int)round(1/$rate);
                $this -> addAnimals($animal1, 1);
                $this -> addAnimals($animal2, (-1) * $rate);
                
            }
        }

        public function attack($animal)
        {
            switch ($animal) {
                case new \Farmer\Animal\Fox: { //* lose all rabbits
                    $dogObject = new \Farmer\Animal\Dog;
                    $dogAmount = $this -> getAnimalAmount($dogObject);
                    
                    if ($dogAmount > 0) {
                        $this -> setAnimalAmount($dogObject, $dogAmount - 1);
                    } else {
                        $this -> removeAnimals([new \Farmer\Animal\Rabbit], true);
                    }
                    break;
                }
                case new \Farmer\Animal\Wolf: { //* lose all animals except horses and small dogs
                    $bigDogObject = new \Farmer\Animal\BigDog;
                    $bigDogAmount = $this -> getAnimalAmount($bigDogObject);

                    if ($bigDogAmount > 0) {
                        $this -> setAnimalAmount($bigDogObject, $bigDogAmount - 1);
                    } else {
                        $this -> removeAnimals([new \Farmer\Animal\Horse, new \Farmer\Animal\Dog], false);
                    }
                    break;
                }
            }
        }

        public function getAnimals()
        {
            return $this->animals;
        }
    }
}
