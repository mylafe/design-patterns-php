<?php

require_once 'Car.php';
require_once 'ShallowDrive.php';
require_once 'DeepDrive.php';

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

        /**
         * 改变 $car $cloneDrive 也会被改变
         */
        $car->name = '凯迪拉克';
        $shallowDrive->show();
        $cloneDrive->show();
    }

    /**
     * 深拷贝
     */
    public function deepCopy()
    {
        $car = new Prototype\Car();
        $car->name = '特斯拉';

        $deepDrive = new Prototype\DeepDrive();
        $deepDrive->setCar($car);
        $deepDrive->show();

        $cloneDrive = clone $deepDrive;
        $cloneDrive->show();

        echo '<hr>';

        /**
         * $cloneDrive 并没有随 $deepDrive 的 car 变化
         */
        $car->name = '凯迪拉克';
        $deepDrive->show();
        $cloneDrive->show();
    }
}

$client = new Client();
$client->shallowCopy();
echo '<br>*********************************************************************<br>';
$client->deepCopy();
