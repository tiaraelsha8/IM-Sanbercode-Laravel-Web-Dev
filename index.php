<?php

// require_once('animal.php');
require ('ape.php');
require ('frog.php');

$sheep = new Animal("shaun");

echo "Nama Hewan : " . $sheep -> name . "<br>";
echo "Jumlah Kaki : " . $sheep -> legs . "<br>";
echo "Cold Blooded : " . $sheep -> cold_blooded . "<br> <br>";


$kodok = new Frog("buduk");

echo "Nama Hewan : " . $kodok -> name . "<br>";
echo "Jumlah Kaki : " . $kodok -> legs . "<br>";
echo "Cold Blooded : " . $kodok -> cold_blooded . "<br>";
$kodok->jump();
echo "<br> <br>";

$sungokong = new Ape("kera sakti");

echo "Nama Hewan : " . $sungokong -> name . "<br>";
echo "Jumlah Kaki : " . $sungokong -> legs . "<br>";
echo "Cold Blooded : " . $sungokong -> cold_blooded . "<br>";
$sungokong->yell();
