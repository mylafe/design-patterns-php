## 里氏代换原则

在软件中将一个基类对象替换成它的子类对象，程序将不会产生任何错误和异常，反过来则不成立。如果一个软件实体使用的是一个子类对象的话，那么它不一定能够使用基类对象。

示例，我们的系统用户类型分为：普通用户（CommonCustomer）和 VIP 用户（VipCustomer），当用户收到留言时需要给用户发送邮件通知。原系统设计如下：

````php
<?php

/**
 * 发送邮件
 */
class EmailSender
{
    /**
     * 发送邮件给普通用户
     */
    public function sendToCommonCustomer(CommonCustomer $customer)
    {
        printf("Send email to %s[%s]", $customer->getName(), $customer->getEmail());
    }

    /**
     * 发送邮件给 VIP 用户
     */
    public function sendToVipCustomer(VipCustomer $vip)
    {
        printf("Send email to %s[%s]", $vip->getName(), $vip->getEmail());
    }    
}

/**
 * 普通用户
 */
class CommonCustomer
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

/**
 * Vip 用户
 */
class VipCustomer
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

$customer = new CommonCustomer("litao", "litao@qq.com");
$vip = new VipCustomer("vip", "litao_vip@qq.com");

$sender = new EmailSender();
$sender->sendToCommonCustomer($customer);
$sender->sendToVipCustomer($vip);
````
这里，为了演示说明我们通过在 EmailSender 类中的 send* 方法中使用类型提示功能，对接收参数进行限制。所以如果有多个用户类型可能就需要实现多个 send 方法才行。

依据 里氏替换原则 我们知道，能够接收父类的地方 一定 能够接收子类作为参数。所以我们仅需定义 send 方法来接收父类即可实现不同类型用户的邮件发送功能：

````php
<?php

/**
 * 发送邮件
 */
class EmailSender
{
    /**
     * 发送邮件给普通用户
     */
    public function send(Customer $customer)
    {
        printf("Send email to %s[%s]", $customer->getName(), $customer->getEmail());
    }
}

/**
 * 用户抽象类
 */
abstract class Customer
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

}

/**
 * 普通用户
 */
class CommonCustomer extends Customer
{
}

/**
 * Vip 用户
 */
class VipCustomer extends Customer
{
}

$customer = new CommonCustomer("litao", "litao@qq.com");
$vip = new VipCustomer("vip", "litao_vip@qq.com");

$sender = new EmailSender();
$sender->send($customer);
$sender->send($vip);
````
修改后的 send 方法接收 Customer 抽象类作为参数，到实际运行时传入具体实现类就可以轻松扩展需求，再多客户类型也不用担心了。
