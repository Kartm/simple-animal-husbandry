<?php
namespace Farmer\Herd {
    require_once 'vendor/autoload.php';
    class Herd
    {
        private $animals = array();

        public function getAnimalAmount($animal)
        {
            return $this -> animals[(string)$animal] ?? 0;
        }

        public function setAnimalAmount($animal, $amount)
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
            $reproductionOutcome = null;
            $reproductionArray = $animal2 -> getReproductionArray();
            if (array_key_exists((string)$animal1, $reproductionArray)) {
                $reproductionOutcome = $reproductionArray[(string)$animal1];
            }

            if ($reproductionOutcome !== null) {
                $this -> addAnimals($animal1, $reproductionOutcome);
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
            $exchangeArray = $animal1 -> getExchangeArray();
            $rate = $exchangeArray[(string)$animal2];
            if ($rate >= (double)(1)) {
                $rate = (int)$rate;
                $this -> addAnimals($animal1, -1);
                $this -> addAnimals($animal2, $rate);
            } else {
                $rate = (int)round(1/$rate);
                $this -> addAnimals($animal1, (-1) * $rate);
                $this -> addAnimals($animal2, 1);
            }
        }

        private function getDefenderAgainst($predator)
        {
            foreach ($this -> animals as $animal => $amount) {
                if ($amount > 0) {
                    $className = "\Farmer\Animal\\".$animal;
                    $animalObject = new $className;
                    if ($animalObject instanceof \Farmer\Animal\Watchdog) {
                        if (in_array((string)$predator, $animalObject -> getDefendAgainst())) {
                            return $animal;
                        }
                    }
                }
            }
            return null;
        }

        private function predatorAction($predator): void
        {
            foreach ($predator -> getTargetAnimals() as $key => $animal) {
                if (array_key_exists($animal, $this -> animals)) {
                    $this -> animals[$animal] = 0;
                }
            }
            return;
        }

        public function attack($predator)
        {
            $defender = $this -> getDefenderAgainst($predator);
            if ($defender === null) {
                $this -> predatorAction($predator);
            } else {
                $this -> addAnimals($defender, -1);
            }
        }

        public function getAnimals()
        {
            return $this -> animals;
        }
    }
}
