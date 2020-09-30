<?php

namespace Mylafe\DesignPatterns\ClassAdapter;

/**
 * 目标类接口
 */
interface Target
{
    /**
     * 支付
     */
    public function pay();

    /**
     * 通知
     */
    public function notify();
}
