<?php

namespace Mylafe\DesignPatterns\AbstractFactoryWithReflection;

/**
 * 适用于 SQLite 的 Article
 */
class SQLiteArticle implements Article
{
    /**
     * 新增
     */
    public function insert()
    {
        echo '向 SQLite 数据库中插入 Article';
    }

    /**
     * 查询
     */
    public function select()
    {
        echo '从 SQLite 数据库中查询 Article';
    }
}
