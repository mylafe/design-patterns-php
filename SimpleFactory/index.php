<?php
require_once 'Operation.php';
require_once 'Add.php';
require_once 'Sub.php';
require_once 'Mul.php';
require_once 'Div.php';
require_once 'Factory.php';
use Mylafe\DesignPatterns\SimpleFactory;

//$operation = new SimpleFactory\Add();
$factory = new SimpleFactory\Factory();
$operation = $factory->create('+');

$operation->setNumberA(1);
$operation->setNumberB(2);
$result = $operation->getResult();
echo $result;
