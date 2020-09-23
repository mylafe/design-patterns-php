<?php

namespace Mylafe\DesignPatterns\AbstractFactory;

/**
 * MySQL 工厂
 */
class MySQLFactory implements Factory
{
    /**
     * 创建 MySQLUser 产品
     */
    public function createUser()
    {
        return new MySQLUser();
    }

    /**
     * 创建 MySQLArticle 产品
     */
    public function createArticle()
    {
        return new MySQLArticle();
    }
}
