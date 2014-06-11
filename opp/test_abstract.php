<?php
/**
 * 抽象类的基本特征
* 1 定义为抽象的类不能被实例化。
* 2 任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。
* 3 被定义为抽象的方法只是声明了其调用方式（参数），不能定义其具体的功能实现。
*
* 接口
* 1 使用接口（interface），可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
* 2 声明接口 interface 使用接口 implements
* 3 实现接口的类必须实现接口的所有方法
* 4 接口可以继承，
*
* final:
*     1 如果父类中的方法被声明为 final，则子类无法覆盖该方法。
*     2 如果一个类被声明为 final，则不能被继承。
*
*
*/

abstract  class AbstractClass
{

     abstract  function test();
}

//$a = new AbstractClass();

class Son extends AbstractClass
{
    public function test()
    {
        echo "say test\n";
    }
}
$son = new Son();
$son->test();


interface Thing
{
    public function name();
}

interface Door extends Thing
{
    const DOOR_NAME="door";
    public function open();
    public function close();
}

class GlassDoor implements Door
{
    public function name()
    {
        echo "name";
    }

    public function open()
    {
        echo "open glass door\n";
    }
    public function close()
    {
        echo "close glass door\n";
    }
}

$glass_door = new GlassDoor();
$glass_door->open();
$glass_door->close();
var_dump($glass_door instanceof GlassDoor);
var_dump($glass_door instanceof Door);


//final class FinalTest
class FinalTest
{

}
class SonFinal extends FinalTest
{

}

$sf = new SonFinal();







