<?php

require_once 'phpunit.phar';
require_once '../SplClassLoader.php';
$loader = new SplClassLoader(null,'../lib');
$loader->register();
