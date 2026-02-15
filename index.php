<?php

$name = "Oleg";
$age = 25;

echo "My name is " . $name . ", I am " . $age . "<br>";

$numbers = [1, 2, 3];

$name = [
   "name" => "Oleg",
   "age" => 25
];

echo "Name: " . $name["name"] . "<br>";

$string = "apple,banana,orange";
$array = explode(",", $string);
echo implode(" & ", $array) . "<br>";

$var = "hello";
$$var = "All!";
echo "Var var: " . $hello . "<br>";

echo "5 == '5' : ";
var_dump(5 == "5");
echo "<br>";

echo "5 === '5' : ";
var_dump(5 === "5");
echo "<br>";

$num = "25";
$numInt = (int)$num;
echo "String to int: ";
var_dump($numInt);
