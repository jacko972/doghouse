<?php

require_once 'SplClassLoader.php';
$loader = new SplClassLoader(null,'lib/');
$loader->register();


$beagle1 = DogFactory::create('beagle','toto','M');
$beagle2 = DogFactory::create('beagle','tata','F');
$bernese = DogFactory::create('bernese','lulu','M');
$chihawawa = DogFactory::create('chihawawa','mimi','F');

$dogHouse1 = new Doghouse(1);
$dogHouse1->take($beagle1);

//echo $beagle1."<br />".$beagle2."<br />".$bernese."<br />".$chihawawa;




