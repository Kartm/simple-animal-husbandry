<?php
namespace Farmer\Herd {
    require_once 'vendor/autoload.php';
    class Herd
    {
        private $animals = array();

        private function getAnimalAmount($animal)
        {
            return $this -> animals[(string)$animal] ?? 0;
        }

        private function setAnimalAmount($animal, $amount)
        {
            $this -> animals[(string)$animal] = $amount;
        }

        public function addAnimals($animal, $amount)
        {
            $oldAmount = $this -> getAnimalAmount($animal);
            $newAmount = $amount + $oldAmount;

            $this -> setAnimalAmount($animal, $newAmount);
        }

        public function reproduce($animal1, $animal2)
        {
            if ($animal1 == $animal2) { //matching animals
                $this -> addAnimals($animal1, 1);
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

        //todo fix this method
        public function exchange($animal1, $animal2)
        {
            $rate = $animal1 -> exchangeArray[(string)$animal2];

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
            switch ((string)$animal) {
                case (string)new \Farmer\Animal\Fox: { 
                    $this -> animals = \Farmer\Animal\Fox::action($this);
                    break;
                }
                case (string)new \Farmer\Animal\Wolf: { 
                    $this -> animals = \Farmer\Animal\Wolf::action($this);
                    break;
                }
            }
        }

        public function getAnimals()
        {
            return $this -> animals;
        }
    }
}
