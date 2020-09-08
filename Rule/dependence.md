## 依赖倒转原则

抽象不应该依赖于细节，细节应当依赖于抽象。换言之，要针对接口编程，而不是针对实现编程。

在里氏替换原则中我们在未进行优化的代码中将 CommonCustomer 类实例作为 sendToCommonCustomer 的参数，来实现发送用户邮件的业务逻辑，这里就违反了「依赖倒置原则」。

如果想在模块中实现符合依赖倒置原则的设计，要将依赖的组件抽象成更高层的抽象类（接口）如前面的 Customer 类，然后通过采用 依赖注入（Dependency Injection） 的方式将具体实现注入到模块中。另外，就是要确保该原则的正确应用，实现类应当仅实现在抽象类或接口中声明的方法，否则可能造成无法调用到实现类新增方法的问题。

这里提到「依赖注入」设计模式，简单来说就是将系统的依赖有硬编码方式，转换成通过采用 设值注入（setter）、构造函数注入 和 接口注入 这三种方式设置到被依赖的系统中，感兴趣的朋友可以阅读我写的 深入浅出依赖注入 一文。

举例，我们的用户在登录完成后需要通过缓存服务来缓存用户数据：

````php
<?php

class MemcachedCache
{
    public function set($key, $value)
    {
        printf ("%s for key %s has cached.", $key, json_encode($value));
    }
}

class User
{
    private $cache;

    /**
     * User 依赖于 MemcachedCache 服务（或者说组件）
     */
    public function __construct()
    {
        $this->cache = new MemcachedCache();
    }

    public function login()
    {
        $user = ['id' => 1, 'name' => 'litao'];
        $this->cache->set('dp:uid:' . $user['id'], $user);
    }
}

$user = new User();
$user->login();
````
这里，我们的缓存依赖于 MemcachedCache 缓存服务。然而由于业务的需要，我们需要缓存服务有 Memacached 迁移到 Redis 服务。当然，现有代码中我们就无法在不修改 User 类的构造函数的情况下轻松完成缓存服务的迁移工作。

那么，我们可以通过使用 依赖注入 的方式，来实现依赖倒置原则：

````php
<?php

class Cache
{
    public function set($key, $value)
    {
        printf ("%s for key %s has cached.", $key, json_encode($value));
    }
}

class RedisCache extends Cache
{
}

class MemcachedCache extends Cache
{
}

class User
{
    private $cache;

    /**
     * 构造函数注入
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * 设值注入
     */
    public function setCache(Cache $cache)
    {
        $this->cache = $cache;
    }

    public function login()
    {
        $user = ['id' => 1, 'name' => 'liugongzi'];
        $this->cache->set('dp:uid:' . $user['id'], $user);
    }
}

// use MemcachedCache
$user =  new User(new MemcachedCache());
$user->login();

// use RedisCache
$user->setCache(new RedisCache());
$user->login();
````
