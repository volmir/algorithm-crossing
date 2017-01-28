<?php

include 'classes/autoload.php';

$crossing = new Crossing();

$crossing->init(new Logger(), new Boat(), new River());

$crossing->setPeople(new Adult('Иван'));
$crossing->setPeople(new Adult('Мария'));
$crossing->setPeople(new Fisherman('Алексей'));
$crossing->setPeople(new Child('Виктор'));
$crossing->setPeople(new Child('Настя'));
//$crossing->setPeople(new Adult('Василий'));
//$crossing->setPeople(new Child('Валентина'));
//$crossing->setPeople(new Child('Олег'));

$crossing->run();
