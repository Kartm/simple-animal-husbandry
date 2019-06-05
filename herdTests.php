<?php
require 'game.php';

use Farmer\Animal;
use Farmer\Herd\Herd;

class HerdTests extends PHPUnit\Framework\TestCase
{
    // private $herd;
 
    // protected function setUp():void
    // {
    //     $this->herd = new Herd();
    //     var_dump($this -> herd);
    // }
 
    // protected function tearDown():void
    // {
    //     $this->herd = NULL;
    // }
 
    public function test1()
    {
        $herd = new Herd();
        $herd -> addAnimals(new Animal\Rabbit, 6);
        $herd -> addAnimals(new Animal\Pig, 1);
        $herd -> reproduce(new Animal\Rabbit, new Animal\Pig);

        $expected = array();
        $expected["Rabbit"] = 9;
        $expected["Pig"] = 2;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test2()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Pig, 1);
        $herd->reproduce(new Animal\Sheep, new Animal\Pig);

        $expected = array();
        $expected["Rabbit"] = 6;
        $expected["Pig"] = 2;
        $expected["Sheep"] = 0;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test3()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 5);
        $herd->addAnimals(new Animal\Cow, 1);
        $herd->reproduce(new Animal\Sheep, new Animal\Pig);

        $expected = array();
        $expected["Rabbit"] = 5;
        $expected["Cow"] = 1;
        $expected["Sheep"] = 0;
        $expected["Pig"] = 0;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test4()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 4);
        $herd->addAnimals(new Animal\Sheep, 2);
        $herd->addAnimals(new Animal\Horse, 1);
        $herd->reproduce(new Animal\Pig, new Animal\Pig);

        $expected = array();
        $expected["Rabbit"] = 4;
        $expected["Sheep"] = 2;
        $expected["Horse"] = 1;
        $expected["Pig"] = 1;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test5()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 1);
        $herd->addAnimals(new Animal\Pig, 2);
        $herd->exchange(new Animal\Rabbit, new Animal\Sheep);
        $herd->exchange(new Animal\Sheep, new Animal\Pig);
        $herd->exchange(new Animal\Pig, new Animal\Cow);

        $expected = array();
        $expected["Rabbit"] = 0;
        $expected["Sheep"] = 0;
        $expected["Pig"] = 0;
        $expected["Cow"] = 1;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test6()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Horse, 1);
        $herd->exchange(new Animal\Horse, new Animal\Cow);
        $herd->exchange(new Animal\Cow, new Animal\Pig);
        $herd->exchange(new Animal\Pig, new Animal\Sheep);

        $expected = array();
        $expected["Horse"] = 0;
        $expected["Cow"] = 1;
        $expected["Pig"] = 2;
        $expected["Sheep"] = 2;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test7()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\Dog, 1);
        $herd->attack(new Animal\Wolf);
        $herd->attack(new Animal\Fox);

        $expected = array();
        $expected["Rabbit"] = 0;
        $expected["Sheep"] = 0;
        $expected["Pig"] = 0;
        $expected["Cow"] = 0;
        $expected["Horse"] = 6;
        $expected["Dog"] = 0;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test8()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\Dog, 1);
        $herd->attack(new Animal\Fox);

        $expected = array();
        $expected["Rabbit"] = 6;
        $expected["Sheep"] = 6;
        $expected["Pig"] = 6;
        $expected["Cow"] = 6;
        $expected["Horse"] = 6;
        $expected["Dog"] = 0;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test9()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\BigDog, 1);
        $herd->attack(new Animal\Wolf);

        $expected = array();
        $expected["Rabbit"] = 6;
        $expected["Sheep"] = 6;
        $expected["Pig"] = 6;
        $expected["Cow"] = 6;
        $expected["Horse"] = 6;
        $expected["BigDog"] = 0;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test10()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->attack(new Animal\Fox);

        $expected = array();
        $expected["Rabbit"] = 0;
        $expected["Sheep"] = 6;
        $expected["Pig"] = 6;
        $expected["Cow"] = 6;
        $expected["Horse"] = 6;
        $this->assertEquals($expected, $herd->getAnimals());
    }

    public function test11()
    {
        $herd = new Herd();
        $herd->addAnimals(new Animal\Rabbit, 6);
        $herd->addAnimals(new Animal\Sheep, 6);
        $herd->addAnimals(new Animal\Pig, 6);
        $herd->addAnimals(new Animal\Cow, 6);
        $herd->addAnimals(new Animal\Horse, 6);
        $herd->addAnimals(new Animal\Dog, 1);
        $herd->attack(new Animal\Wolf);

        $expected = array();
        $expected["Rabbit"] = 0;
        $expected["Sheep"] = 0;
        $expected["Pig"] = 0;
        $expected["Cow"] = 0;
        $expected["Horse"] = 6;
        $expected["Dog"] = 1;
        $this->assertEquals($expected, $herd->getAnimals());
    }
}
