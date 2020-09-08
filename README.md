## 设计模式

#### 概念

设计模式（Design pattern）是软件开发人员在软件开发过程中面临的一般问题的解决方案。它是一套被反复使用的、多数人知晓的、经过分类编目的、代码设计经验的总结。

#### 六大原则

0. [开闭原则](https://github.com/mylafe/design-patterns-php/blob/master/Rule/open.md)（Open Close Principle）：对扩展开放，对修改关闭。在程序需要进行拓展的时候，不能去修改原有的代码，实现一个热插拔的效果。即尽量在不修改原有代码的基础上进行扩展。

1. [里氏代换原则]()（Liskov Substitution Principle）：任何基类可以出现的地方，子类一定可以出现。LSP 是继承复用的基石，只有当派生类可以替换掉基类，且软件单位的功能不受到影响时，基类才能真正被复用。里氏代换原则是对开闭原则的补充，是对实现抽象化的具体步骤的规范。

2. [依赖倒转原则]()（Dependence Inversion Principle）：针对接口编程，依赖于抽象而不依赖于具体。

3. [接口隔离原则]()（Interface Segregation Principle）：使用多个隔离的接口，比使用单个接口要好。降低类之间的耦合度。其实设计模式就是从大型软件架构出发、便于升级和维护的软件设计思想，它强调降低依赖，降低耦合。

4. [迪米特法则]()，又称最少知道原则（Demeter Principle）：一个实体应当尽量少地与其他实体之间发生相互作用，使得系统功能模块相对独立。

5. [合成复用原则]()（Composite Reuse Principle）：尽量使用合成/聚合的方式，而不是使用继承。

#### 分类

设计模式划分为3类总共23种：

创造型：提供了一种在创建对象的同时隐藏创建逻辑的方式，使得程序在判断针对某个给定实例需要创建哪些对象时更加灵活

    单例模式 Singleton Pattern
    抽象工厂模式 Abstract Factory Pattern
    建造者模式 Builder Pattern
    工厂方法模式 Factory Method Pattern
    原型模式 Prototype Pattern

结构型：关注类和对象的组合。继承这一概念被用来组合接口和定义组合对象获得新功能的方式
    
    适配器模式 Adapter Pattern
    桥接模式/桥梁模式 Bridge Pattern
    装饰模式 Decorator Pattern
    组合模式 Composite Pattern
    外观模式/门面模式 Facade Pattern
    享元模式 Flyweight Pattern
    代理模式 Proxy pattern

行为型：更关注对象与对象之间的通信
    
    模板方法模式 Template Method Pattern
    命令模式 Command Pattern
    迭代器模式 Iterator Pattern
    观察者模式 Observer Pattern
    中介者模式 Mediator Pattern
    备忘录模式 Memento Pattern
    解释器模式 Interpreter Pattern
    状态模式 State Pattern
    策略模式 Strategy Pattern
    责任链模式 Chain of Responsibility Pattern
    访问者模式 Visitor Pattern
 
#### 目录

0. [单例模式](https://github.com/mylafe/design-patterns-php/blob/master/Singleton)
1. [简单工厂模式](https://github.com/mylafe/design-patterns-php/blob/master/SimpleFactory)
2. 抽象工厂
3. 原型模式
4. 适配器模式
5. 桥接模式
6. 装饰模式
7. 组合模式
8. 外观模式
9. 代理模式
10. 命令模式
11. 迭代器模式
12. 观察者模式
13. 中介者模式
14. 解释器模式
15. 策略模式
16. 访问者模式
