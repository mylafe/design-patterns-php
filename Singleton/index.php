<?php
require_once 'patterns.php';
use Mylafe\DesignPatterns\Singleton;

$db1 = Singleton\CommonDb::getInstance();
$db1->name = 'demo';
$db2 =  Singleton\CommonDb::getInstance();
$db2->name = 'demo2';

var_dump($db1->name);
var_dump($db2->name);
