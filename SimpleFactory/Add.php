<?php

namespace Mylafe\DesignPatterns\SimpleFactory;

/**
 * 加法
 */
class Add extends Operation
{
    /**
     * 计算结果
     */
    public function getResult()
    {
        return $this->numberA + $this->numberB;
    }
}