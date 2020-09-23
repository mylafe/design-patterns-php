<?php

require_once 'Factory.php';

require_once 'User.php';
require_once 'Article.php';

require_once 'MySQLUser.php';
require_once 'MySQLArticle.php';

require_once 'SQLiteUser.php';
require_once 'SQLiteArticle.php';

use Mylafe\DesignPatterns\AbstractFactoryWithReflection;

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
        $factory = new AbstractFactoryWithReflection\Factory();

        // 创建 user
        $user = $factory->createUser();
        $user->insert();
        echo '<br>';
        $user->select();

        echo '<hr>';

        // 创建 article
        $article = $factory->createArticle();
        $article->insert();
        echo '<br>';
        $article->select();
    }
}

$client = new Client();
$client->run();