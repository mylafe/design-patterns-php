<?php

require_once 'Adaptee.php';
require_once 'Target.php';
require_once 'Adapter.php';

use Mylafe\DesignPatterns\ClassAdapter;

/**
 * 客户端
 */
class Client
{
    /**
     * 运行
     */
    public function run()
    {
        // 原本的类的
        $adaptee = new ClassAdapter\Adaptee();
        $adaptee->pay();
        echo '<br>';

        echo '<hr>';

        /**
         * 适配器
         * 我们可以在不改变原本的 Adaptee 类的情况下改变支付的币种；并且可以灵活的增加新的方法
         */
        $adapter = new ClassAdapter\Adapter();
        $adapter->pay();
        echo '<br>';

        $adapter->notify();
    }
}

$client = new Client();
$client->run();
