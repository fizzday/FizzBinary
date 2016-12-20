<?php
// after command  'composer install'

require __DIR__."/../src/FizzBinary.php";

use Fizzday\FizzBinary\FizzBinary;

$id = 19;
$res = FizzBinary::getLayers($id);
print_r($res); // 5

