<?php

namespace Mylafe\DesignPatterns\AbstractFactory;

/**
 * Article 产品接口
 */
interface Article
{
    /**
     * 新增
     */
    public function insert();

    /**
     * 查询
     */
    public function select();
}
