<?php

namespace Mylafe\DesignPatterns\SimpleFactory;

/**
 * 除法
 */
class Div extends Operation
{
    /**
     * 计算结果
     */
    public function getResult()
    {
        if ($this->numberB == 0) {
            throw new \InvalidArgumentException('除数不能为0');
        }
        return $this->numberA / $this->numberB;
    }
}