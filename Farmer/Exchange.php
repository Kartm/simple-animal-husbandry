<?php
namespace Farmer {
    class Exchange
    {
        private $exchangeArray = array();

        public function __construct()
        {
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

        public function getRate($from, $to)
        {
            $fromArray = $this -> exchangeArray[$from];
            for ($i = 0; $i < sizeof($fromArray); $i++) {
                if (strcmp($fromArray[$i] -> to, $to) == 0) {
                    return $fromArray[$i] -> rate;
                }
            }
        }
    }
}
