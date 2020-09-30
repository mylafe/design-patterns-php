<?php

namespace Mylafe\DesignPatterns\Prototype;

/**
 * Class DeepDrive
 */
class DeepDrive
{

    private $car;

    /**
     * Drive constructor.
     */
    public function __construct()
    {
        echo '准备完成-深拷贝'.'<br>';
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

    public function __clone()
    {
        $this->car = clone $this->car;
    }
}
