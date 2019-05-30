<?php
namespace Farmer\Animal {
    class Animal
    {
        public function __toString() {
            $partial = explode('\\', get_class($this));
            return end($partial);
        }
    }
}