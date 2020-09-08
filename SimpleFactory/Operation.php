<?php

namespace Mylafe\DesignPatterns\SimpleFactory;

/**
 * 操作类型抽象类
 */
abstract class Operation
{
    /**
     * 数值A
     */
    protected $numberA = 0;

    /**
     * 数值B
     */
    protected $numberB = 0;

    /**
     * 计算结果
     */
    abstract public function getResult();

    /**
     * 给 numberA 赋值
     */
    public function setNumberA($number)
    {
        $this->numberA = $number;
    }

    /**
     * 给 numberB 赋值
     */
    public function setNumberB($number)
    {
        $this->numberB = $number;
    }

}