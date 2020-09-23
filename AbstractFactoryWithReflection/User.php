<?php

namespace Mylafe\DesignPatterns\AbstractFactoryWithReflection;

/**
 * User 产品接口
 */
interface User
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
