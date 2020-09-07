<?php
namespace Mylafe\DesignPatterns\Singleton;

/**
 * 单例模式
 */
class CommonDb
{
    public $name;
    //存放实例-私有静态变量
    private static $instance = null;

    //公有化获取实例方法
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * 防止使用new创建多个实例
     */
    private function __construct()
    {

    }

    /**
     * 防止clone多个实例
     */
    private function __clone()
    {

    }

    /**
     * 防止反序列化
     */
    private function __wakeup()
    {

    }
}
