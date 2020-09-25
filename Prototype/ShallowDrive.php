<?php

namespace Mylafe\DesignPatterns\Prototype;

/**
 * Class ShallowDrive
 */
class ShallowDrive
{

    private $car;

    /**
     * Drive constructor.
     */
    public function __construct()
    {
        echo '准备完成';
    }

    /**
     * 选择要开的车
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    public function show()
    {
        echo '开始驾驶'.$this->car->name;
        echo '<br>';
    }
}
