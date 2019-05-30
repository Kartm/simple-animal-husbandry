<?php
    namespace Farmer {
        class ExchangeRate {
            public $to;
            public $rate;

            public function __construct($to, $rate) {
                $this -> to = $to;
                $this -> rate = $rate;
            }
        }

        class Exchange {
            private $exchangeArray = array();

            public function __construct() {
                $this -> exchangeArray = array(
                    "Sheep" => array(new ExchangeRate("Rabbit", (double)(6)), 
                    new ExchangeRate("Pig", (double)(1/2)), 
                    new ExchangeRate("Dog", (double)(1))),

                    "Pig" => array(new ExchangeRate("Sheep", (double)(2)), 
                    new ExchangeRate("Cow", (double)(1/3))),

                    "Cow" => array(new ExchangeRate("Pig", (double)(3)), 
                    new ExchangeRate("Horse", (double)(1/2))), 
                    new ExchangeRate("BigDog", (double)(1)),

                    "Horse" => array(new ExchangeRate("Cow", (double)(2))),
                    "Dog" => array(new ExchangeRate("Sheep", (double)(1))),
                    "BigDog" => array(new ExchangeRate("Cow", (double)(1))),
                    "Rabbit" => array(new ExchangeRate("Sheep", (double)(1/6))),
                );
            }

            function getRate($from, $to) {
                $fromArray = $this -> exchangeArray[$from];
                for($i = 0; $i < sizeof($fromArray); $i++) {
                    if(strcmp($fromArray[$i] -> to, $to) == 0) {
                        return $fromArray[$i] -> rate;
                    }
                }
            }
        }
    }

    namespace Farmer\Animal {
        class Rabbit {}
        class Pig {}
        class Sheep {}
        class Cow {}
        class Horse {}
        class Dog {}
        class BigDog {}
        class Fox {}
        class Wolf {}
    }
    
    namespace Farmer\Herd {
        class Herd {
            private $animals = [];

            private static function getAnimalName($object) {
                $temp = explode("\\", get_class($object));
                return array_pop($temp);
            }

            private function getAnimalAmount($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);
                return isset($this -> animals[$animalName]) ? $this -> animals[$animalName] : 0;
            }

            private function removeAnimals($chosenObjectArray, $isRemovingChosen) {
                $oldAnimals = $this -> animals;
                if($isRemovingChosen == true) { //* removing only chosen animals
                    foreach(array_values($chosenObjectArray) as $chosen) {
                        $animalName = $this -> getAnimalName($chosen);
                        unset($this -> animals[$animalName]);
                    }
                } else { //* removing everything except chosen animals
                    $chosenArray = [];
                    foreach(array_keys($chosenObjectArray) as $chosen) {
                        array_push($chosenArray, $this -> getAnimalName($chosenObjectArray[$chosen]));
                    }
                    

                    foreach(array_keys($oldAnimals) as $animalName) { // inefficient, but I'm doing it for the sake of simplicity
                        if(in_array($animalName, $chosenArray) == false) {
                            unset($this -> animals[$animalName]);
                        }
                    }
                }
            }

            private function setAnimalAmount($animalObject, $newAmount) {
                $animalName = $this -> getAnimalName($animalObject);
                $newAnimal = [$animalName => $newAmount];

                if($newAmount == 0) {
                    unset($this -> animals[$animalName]);
                } else {
                    $this -> animals = array_merge($this -> animals, $newAnimal);
                }
            }

            function addAnimals($animalObject, $amount) {
                $animalName = self::getAnimalName($animalObject);
                $oldValue = $this -> getAnimalAmount($animalObject);
                $newValue = $amount + $oldValue;

                if($newValue == 0) {
                    unset($this -> animals[$animalName]);
                } else {
                    $newAnimal = [$animalName => $newValue];
                    $this -> animals = array_merge($this -> animals, $newAnimal);
                }
            }
    
            function reproduce($animal1Object, $animal2Object) {
                $animal1Name = $this -> getAnimalName($animal1Object);
                $animal2Name = $this -> getAnimalName($animal2Object);

                if(strcasecmp($animal1Name, $animal2Name) == 0) { //matching animals
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
    
            function exchange($animal1Object, $animal2Object) {
                $exchange = new \Farmer\Exchange();
                $animal1Name = $this -> getAnimalName($animal1Object);
                $animal2Name = $this -> getAnimalName($animal2Object);

                $rate = $exchange -> getRate($animal1Name, $animal2Name);

                $animal1Amount = $this -> getAnimalAmount($animal1Object);
                $animal2Amount = $this -> getAnimalAmount($animal2Object);

                if($rate > 1) {
                    $this -> setAnimalAmount($animal1Object, $animal1Amount - 1);
                    $this -> addAnimals($animal2Object, $rate);
                } else {
                    $rate = round(1/$rate);
                    $this -> setAnimalAmount($animal1Object, $animal1Amount - $rate);
                    $this -> addAnimals($animal2Object, 1);
                    
                }
            }
    
            function attack($animalObject) {
                $animalName = $this -> getAnimalName($animalObject);

                if(strcasecmp($animalName, "Fox") == 0) { //* lose all rabbits
                    $dogObject = new \Farmer\Animal\Dog;
                    $dogAmount = $this -> getAnimalAmount($dogObject);
                    
                    if($dogAmount > 0) {
                        $this -> setAnimalAmount($dogObject, $dogAmount - 1);
                    } else {
                        $this -> removeAnimals([new \Farmer\Animal\Rabbit], true);
                    }
                } else if (strcasecmp($animalName, "Wolf") == 0) { //* lose all animals except horses and small dogs
                    $bigDogObject = new \Farmer\Animal\BigDog;
                    $bigDogAmount = $this -> getAnimalAmount($bigDogObject);

                    if($bigDogAmount > 0) {
                        $this -> setAnimalAmount($bigDogObject, $bigDogAmount - 1);
                    } else {
                        $this -> removeAnimals([new \Farmer\Animal\Horse, new \Farmer\Animal\Dog], false);
                    }
                }
            }
    
            function getAnimals() {
                return $this->animals;
            }
        }
    }

    namespace {
        use Farmer\Exchange;
        use Farmer\Animal;
        use Farmer\Herd\Herd;
        
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Pig, 1);
        $herd->reproduce(new Animal\Rabbit, new Animal\Pig);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Pig, 1);
        $herd->reproduce(new Animal\Sheep, new Animal\Pig);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 5);
        $herd->addAnimals(new Animal\Cow, 1);
        $herd->reproduce(new Animal\Sheep, new Animal\Pig);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 4);
        $herd->addAnimals(new Animal\Sheep, 2);
        $herd->addAnimals(new Animal\Horse, 1);
        $herd->reproduce(new Animal\Pig, new Animal\Pig);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 1);
        $herd->addAnimals(new Animal\Pig, 2);
        $herd->exchange(new Animal\Rabbit, new Animal\Sheep);
        $herd->exchange(new Animal\Sheep, new Animal\Pig);
        $herd->exchange(new Animal\Pig, new Animal\Cow);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Horse, 1);
        $herd->exchange(new Animal\Horse, new Animal\Cow);
        $herd->exchange(new Animal\Cow, new Animal\Pig);
        $herd->exchange(new Animal\Pig, new Animal\Sheep);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\Dog, 1);
        $herd->attack(new Animal\Wolf);
        $herd->attack(new Animal\Fox);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\Dog, 1);
        $herd->attack(new Animal\Fox);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\BigDog, 1);
        $herd->attack(new Animal\Wolf);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->attack(new Animal\Fox);
        var_dump($herd->getAnimals());
        var_dump("");

        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\Dog, 1);
        $herd->attack(new Animal\Wolf);
        var_dump($herd->getAnimals());

    }
?>