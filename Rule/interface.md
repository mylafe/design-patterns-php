## 接口隔离原则

接口隔离原则：使用多个专门的接口，而不使用单一的总接口，即客户端不应该依赖那些它不需要的接口。

简单来说就是不要让一个接口来做太多的事情。比如我们定义了一个 VipDataDisplay 接口来完成如下功能：

通过 readUsers 方法读取用户数据：
- 可以使用 transformToXml 方法将用户记录转存为 XML 文件；
- 通过 createChart 和 displayChart 方法完成创建图表及显示；
- 还可以通过 createReport 和 displayReport 创建文字报表及现实。

````php
abstract class VipDataDisplay
{
    public function readUsers()
    {
        echo 'Read all users.';
    }

    public function transformToXml()
    {
        echo 'save user to xml file.';
    }

    public function createChart()
    {
        echo 'create user chart.';
    }

    public function displayChart()
    {
        echo 'display user chart.';
    }

    public function createReport()
    {
        echo 'create user report.';
    }

    public function displayReport()
    {
        echo 'display user report.';

    }
}

class CommonCustomerDataDisplay extends VipDataDisplay
{

}
````
现在我们的普通用户 CommonCustomerDataDisplay 不需要 Vip 用户这么复杂的展现形式，仅需要进行图表显示即可，但是如果继承 VipDataDisplay 类就意味着继承抽象类中所有方法。

现在我们将 VipDataDisplay 抽象类进行拆分，封装进不同的接口中：

````php
interface ReaderHandler
{
    public function readUsers();
}

interface XmlTransformer
{
    public function transformToXml();
}

interface ChartHandler
{
    public function createChart();

    public function displayChart();
}

interface ReportHandler
{
    public function createReport();

    public function displayReport();
}

class CommonCustomerDataDisplay implements ReaderHandler, ChartHandler
{
    public function readUsers()
    {
        echo 'Read all users.';
    }

    public function createReport()
    {
        echo 'create user report.';
    }

    public function displayReport()
    {
        echo 'display user report.';

    }
}
````
重构完成后，仅需在实现类中实现接口中的方法即可。
