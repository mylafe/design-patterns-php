<?php

namespace Mylafe\DesignPatterns\ClassAdapter;

/**
 * 源类
 */
class Adaptee
{
    /**
     * 金额
     */
    public $money = '￥34';

    /**
     * 支付
     */
    public function pay()
    {
        echo '支付' . $this->money;
    }
}
