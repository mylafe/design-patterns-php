<?php

namespace Mylafe\DesignPatterns\SimpleFactory;

/**
 * 乘法
 */
class Mul extends Operation
{
    /**
     * 计算结果
     */
    public function getResult()
    {
        return $this->numberA * $this->numberB;
    }
}