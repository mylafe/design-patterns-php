## 开闭原则

开闭原则是最重要的面向对象设计原则，是可复用设计的基石。
对扩展开放、对修改关闭，即尽量在不修改原有代码的基础上进行扩展。要想系统满足开闭原则，需要对系统进行抽象。

通过接口或抽象类将系统进行抽象化设计，然后通过实现类对系统进行扩展。当有新需求需要修改系统行为，简单的通过增加新的实现类，就能实现扩展业务，达到在不修改已有代码的基础上扩展系统功能这一目标。

示例：系统提供多种图表展现形式，如柱状图、饼状图，下面是不符合开闭原则的实现：

````php
<?php

/**
 * 显示图表
 */
class ChartDisplay
{
    private $chart;

    /**
     * @param string $type 图标实现类型
     */
    public function __construct($type)
    {
        switch ($type) {
            case 'pie':
                $this->chart = new PieChart();
                break;

            case 'bar':
                $this->chart = new BarChart();
                break;

            default:
                $this->chart = new BarChart();
        }

        return $this;
    }

    /**
     * 显示图标 
     */
    public function display()
    {
        $this->chart->render();
    }
}

/**
 * 饼图
 */
class PieChart
{
    public function render()
    {
        echo 'Pie chart.';
    }
}

/**
 * 柱状图
 */
class BarChart
{
    public function render()
    {
        echo 'Bar chart.';
    }
}

$pie = new ChartDisplay('pie');
$pie->display(); //Pie chart.

$bar = new ChartDisplay('bar');
$bar->display(); //Bar chart.

````
在这里我们的 ChartDisplay 每增加一种图表显示，都需要在构造函数中对代码进行修改。所以，违反了 开闭原则。我们可以通过声明一个 Chart 抽象类（或接口），再将接口传入 ChartDisplay 构造函数，实现面向接口编程。
````php
/**
* 图表接口
*/
interface ChartInterface
{
    /**
    * 绘制图表
    */
    public function render();
}

class PieChart implements ChartInterface
{
    public function render()
    {
        echo 'Pie chart.';
    }
}

class BarChart implements ChartInterface
{
    public function render()
    {
        echo 'Bar chart.';
    }
}

/**
 * 显示图表
 */
class ChartDisplay
{
    private $chart;

    /**
     * @param ChartInterface $chart
     */
    public function __construct(ChartInterface $chart)
    {
        $this->chart = $chart;
    }

    /**
     * 显示图标 
     */
    public function display()
    {
        $this->chart->render();
    }
}

$config = ['PieChart', 'BarChart'];

foreach ($config as $key => $chart) {
    $display = new ChartDisplay(new $chart());
    $display->display();
}
````
修改后的 ChartDisplay 通过接收 ChartInterface 接口作为构造函数参数，实现了图表显示不依赖于具体的实现类即 面向接口编程。在不修改源码的情况下，随时增加一个 LineChart 线状图表显示。具体图表实现可以从配置文件中读取。
