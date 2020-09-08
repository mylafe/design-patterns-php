## 合成复用原则

合成复用原则：尽量使用对象组合，而不是继承来达到复用的目的。

合成复用原则就是在一个新的对象里通过关联关系（包括组合和聚合）来使用一些已有的对象，使之成为新对象的一部分；新对象通过委派调用已有对象的方法达到复用功能的目的。简言之：复用时要尽量使用组合 / 聚合关系（关联关系） ，少用继承。

何时使用继承，何时使用组合（或聚合）？

当两个类之间的关系属于 IS-A 关系时，如 dog is animal，使用 继承；而如果两个类之间属于 HAS-A 关系，如 engineer has a computer，则优先选择组合（或聚合）设计。

示例，我们的系统有用日志（Logger）功能，然后我们实现了向控制台输入日志（SimpleLogger）和向文件写入日志（FileLogger）两种实现：

````php
<?php

abstract class Logger
{
    abstract public function write($log);
}

class SimpleLogger extends Logger
{
    public function write($log)
    {
        print((string) $log);
    }
}

class FileLogger extends Logger
{
    public function write($log)
    {
        file_put_contents('logger.log', (string) $log);
    }
}

$log = "This is a log.";

$sl = new SimpleLogger();
$sl->write($log);// This is a log.

$fl = new FileLogger();
$fl->write($log);
````
看起来很好，我们的简单日志和文件日志能够按照我们预定的结果输出和写入文件。很快，我们的日志需求有了写增强，现在我们需要将日志同时向控制台和文件中写入。有几种解决方案吧：

- 重新定义一个子类去同时写入控制台和文件，但这似乎没有用上我们已经定义好的两个实现类：SimpleLogger 和 FileLogger；
- 去继承其中的一个类，然后实现另外一个类的方法。比如继承 SimpleLogger，然后实现写入文件日志的方法；嗯，没办法 PHP 是单继承的语言；
- 使用组合模式，将 SimpleLogger 和 FileLogger 聚合起来使用。

我们直接看最后一种解决方案吧，前两种实在是有点。

````php
class AggregateLogger
{
    /**
     * 日志对象池
     */
    private $loggers = [];

    public function addLogger(Logger $logger)
    {
        $hash = spl_object_hash($logger);
        $this->loggers[$hash] = $logger;
    }

    public function write($log)
    {
        array_map(function ($logger) use ($log) {
            $logger->write($log);
        }, $this->loggers);
    }
}

$log = "This is a log.";

$aggregate = new AggregateLogger();

$aggregate->addLogger(new SimpleLogger());// 加入简单日志 SimpleLogger
$aggregate->addLogger(new FileLogger());// 键入文件日志 FileLogger

$aggregate->write($log);
````
