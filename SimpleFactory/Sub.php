<?php

namespace Mylafe\DesignPatterns\SimpleFactory;

/**
 * 减法
 */
class Sub extends Operation
{
    /**
     * 计算结果
     */
    public function getResult()
    {
        return $this->numberA - $this->numberB;
    }
}