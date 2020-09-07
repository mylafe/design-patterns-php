<?php
require_once 'patterns.php';
use Mylafe\DesignPatterns\Singleton;

$db1 = Singleton\CommonDb::getInstance();
$db1->name = 'demo';
$db2 =  Singleton\CommonDb::getInstance();
$db2->name = 'demo2';

/**
 * D:\Program Files (x86)\Ampps\www\github\design-patterns-php\Singleton\index.php:10:string 'demo2' (length=5)
 * D:\Program Files (x86)\Ampps\www\github\design-patterns-php\Singleton\index.php:11:string 'demo2' (length=5)
 */
var_dump($db1->name);
var_dump($db2->name);
