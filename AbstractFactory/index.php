<?php

require_once 'Factory.php';
require_once 'User.php';
require_once 'Article.php';

require_once 'MySQLFactory.php';
require_once 'MySQLUser.php';
require_once 'MySQLArticle.php';

require_once 'SQLiteFactory.php';
require_once 'SQLiteUser.php';
require_once 'SQLiteArticle.php';

use Mylafe\DesignPatterns\AbstractFactory;

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
        // 使用 MySQL
        $factory = new AbstractFactory\MySQLFactory();
        $user = $factory->createUser();
        $user->insert();
        echo '<br>';
        $user->select();

        echo '<hr>';

        $factory = new AbstractFactory\MySQLFactory();
        // 创建 article
        $article = $factory->createArticle();
        $article->insert();
        echo '<br>';
        $article->select();

        echo '<hr>';

        // 使用 SQLite
        $factory = new AbstractFactory\SQLiteFactory();
        // 创建 user
        $user = $factory->createUser();
        $user->insert();
        echo '<br>';
        $user->select();

        echo '<hr>';

        $factory = new AbstractFactory\SQLiteFactory();
        // 创建 article
        $article = $factory->createArticle();
        $article->insert();
        echo '<br>';
        $article->select();
    }
}

$client = new Client();
$client->run();
