<?php
namespace Farmer\Animal {
    class Animal
    {
        //todo move exchangeArray here
        //todo initializing exchangeArray is unintuitive
        public function __toString() {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}