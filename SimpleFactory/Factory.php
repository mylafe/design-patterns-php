<?php

namespace Mylafe\DesignPatterns\SimpleFactory;

/**
 * 工厂类
 */
class Factory
{
    /**
     * 创建一种运算
     */
    public function create($operate)
    {
        switch ($operate) {
            case '+':
                $result = new Add();
                break;
            case '-':
                $result = new Sub();
                break;
            case '*':
                $result = new Mul();
                break;
            case '/':
                $result = new Div();
                break;
            default:
                throw new \InvalidArgumentException('暂不支持的运算');
        }
        return $result;
    }
}
