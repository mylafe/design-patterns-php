<?php

namespace Mylafe\DesignPatterns\AbstractFactoryWithReflection;

/**
 * Article 产品接口
 */
interface Article
{
    /**
     * 新增
     *
     * @return mixed
     */
    public function insert();

    /**
     * 查询
     *
     * @return mixed
     */
    public function select();
}