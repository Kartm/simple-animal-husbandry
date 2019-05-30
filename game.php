<?php
namespace {
    spl_autoload_register(function ($class) {
        $partial = explode('\\', $class);
        $class = end($partial);
        $sources = array("Farmer/$class.php", "Farmer/Animal/$class.php");
        
        foreach ($sources as $source) {
            if (file_exists($source)) {
                require_once $source;
            }
        }
    });

    use Farmer\Animal;
    use Farmer\Herd\Herd;

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Pig, 1);
    // $herd->reproduce(new Animal\Rabbit, new Animal\Pig);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Pig, 1);
    // $herd->reproduce(new Animal\Sheep, new Animal\Pig);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 5);
    // $herd->addAnimals(new Animal\Cow, 1);
    // $herd->reproduce(new Animal\Sheep, new Animal\Pig);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 4);
    // $herd->addAnimals(new Animal\Sheep, 2);
    // $herd->addAnimals(new Animal\Horse, 1);
    // $herd->reproduce(new Animal\Pig, new Animal\Pig);
    // var_dump($herd->getAnimals());
    // var_dump("");

    $test = new Animal\Rabbit;

    //! exchange is broken

    //! Cow - 1
    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Sheep, 1);
    // $herd->addAnimals(new Animal\Pig, 2);
    // $herd->exchange(new Animal\Rabbit, new Animal\Sheep);
    // $herd->exchange(new Animal\Sheep, new Animal\Pig);
    // $herd->exchange(new Animal\Pig, new Animal\Cow);
    // var_dump($herd->getAnimals());
    // var_dump("");

    //! Cow - 1
    //! Pig - 2
    //! Sheep - 2
    $herd = new Herd();
    $herd->addAnimals(new Animal\Horse, 1);
    $herd->exchange(new Animal\Horse, new Animal\Cow);
    $herd->exchange(new Animal\Cow, new Animal\Pig);
    $herd->exchange(new Animal\Pig, new Animal\Sheep);
    var_dump($herd->getAnimals());
    var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Sheep, 6);
    // $herd->addAnimals(new Animal\Pig, 6);
    // $herd->addAnimals(new Animal\Cow, 6);
    // $herd->addAnimals(new Animal\Horse, 6);
    // $herd->addAnimals(new Animal\Dog, 1);
    // $herd->attack(new Animal\Wolf);
    // $herd->attack(new Animal\Fox);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Sheep, 6);
    // $herd->addAnimals(new Animal\Pig, 6);
    // $herd->addAnimals(new Animal\Cow, 6);
    // $herd->addAnimals(new Animal\Horse, 6);
    // $herd->addAnimals(new Animal\Dog, 1);
    // $herd->attack(new Animal\Fox);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Sheep, 6);
    // $herd->addAnimals(new Animal\Pig, 6);
    // $herd->addAnimals(new Animal\Cow, 6);
    // $herd->addAnimals(new Animal\Horse, 6);
    // $herd->addAnimals(new Animal\BigDog, 1);
    // $herd->attack(new Animal\Wolf);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Sheep, 6);
    // $herd->addAnimals(new Animal\Pig, 6);
    // $herd->addAnimals(new Animal\Cow, 6);
    // $herd->addAnimals(new Animal\Horse, 6);
    // $herd->attack(new Animal\Fox);
    // var_dump($herd->getAnimals());
    // var_dump("");

    // $herd = new Herd();
    // $herd->addAnimals(new Animal\Rabbit, 6);
    // $herd->addAnimals(new Animal\Sheep, 6);
    // $herd->addAnimals(new Animal\Pig, 6);
    // $herd->addAnimals(new Animal\Cow, 6);
    // $herd->addAnimals(new Animal\Horse, 6);
    // $herd->addAnimals(new Animal\Dog, 1);
    // $herd->attack(new Animal\Wolf);
    // var_dump($herd->getAnimals());
}
