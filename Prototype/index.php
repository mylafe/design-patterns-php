<?php

require_once 'Car.php';
require_once 'ShallowDrive.php';

use Mylafe\DesignPatterns\Prototype;

/**
 * 客户端
 */
class Client
{
    /**
     * 浅复制
     *
     */
    public function shallowCopy()
    {
        $car = new Prototype\Car();
        $car->name = '特斯拉';
        $shallowDrive = new Prototype\ShallowDrive();
        $shallowDrive->setCar($car);
        $shallowDrive->show();

        $cloneDrive = clone $shallowDrive;
        $cloneDrive->show();

        echo '<hr>';
        $car->name = '凯迪拉克';
        $shallowDrive->show();
        $cloneDrive->show();
    }

}

$client = new Client();
$client->shallowCopy();
