<?php

namespace Mylafe\DesignPatterns\Prototype;

/**
 * Class Car
 */
class Car
{
    /**
     * 车名
     */
    public $name;

    /**
     * 设置车名
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
