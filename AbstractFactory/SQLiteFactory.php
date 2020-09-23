<?php

namespace Mylafe\DesignPatterns\AbstractFactory;

/**
 * SQLite 工厂
 */
class SQLiteFactory implements Factory
{
    /**
     * 创建 SQLiteUser 产品
     */
    public function createUser()
    {
        return new SQLiteUser();
    }

    /**
     * 创建 SQLiteArticle 产品
     */
    public function createArticle()
    {
        return new SQLiteArticle();
    }
}
