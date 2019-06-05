<?php
namespace Farmer\Animal {
    class Wolf extends \Farmer\Animal\Predator
    {
        //todo every animal except Horse and Dog
        public $targetAnimals = array();
        public function __construct() 
        {
            parent::__construct($this -> targetAnimals);
        }
    }
}
