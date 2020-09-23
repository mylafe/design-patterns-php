<?php

namespace Mylafe\DesignPatterns\AbstractFactory;

/**
 * 工厂接口
 */
interface Factory
{
    /**
     * 创建 User 产品
     */
    public function createUser();

    /**
     * 创建 Article 产品
     */
    public function createArticle();
}
