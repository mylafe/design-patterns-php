<?php

namespace Mylafe\DesignPatterns\AbstractFactory;

/**
 * 应用于 MySQL 的 User
 */
class MySQLUser implements User
{
    /**
     * 新增
     */
    public function insert()
    {
        echo '向 MySQL 数据库中插入 User';
    }

    /**
     * 查询
     */
    public function select()
    {
        echo '从 MySQL 数据库中查询 User';
    }
}
