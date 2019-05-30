<?php
namespace Farmer {
    class ExchangeRate
    {
        public $to;
        public $rate;

        public function __construct($to, $rate)
        {
            $this -> to = $to;
            $this -> rate = $rate;
        }
    }
}
