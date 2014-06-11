<?php
/**
 *
* Copyright(c) 201x,
* All rights reserved.
*
* 功 能：
* @author bikang@book.sina.com
* @date 2014-6-10
* 版 本：1.0
*
* 1 利用class创建对象，对象有属性和方法
* 2 属性又分为静态属性和动态属性，方法也分为静态方法和动态方法
* 3 用new实例化对象
* 4 可以直接通过 new $name 创建对象
* 5 也可通过return new static创建对象
* 6 extends 用于继承
* 7 类常量 用const声明，可用类名或者self访问
* 8 属性访问控制
*     var public 公有的
*     protected 保护的 父类子类本类方位
*     private 私有的本类访问
* 9 static 中只能出现 self satic parent 不能使用$this 和->
*
*
*
*
*
*
*
 */
/*
 php5.5的新特性
namespace NS {
    class ClassName {
    }

    echo ClassName::class;
}
*/
class SimpleClass
{
    public $default_name = "tom";
    public static $name = " cat";

    public function hi()
    {
        var_dump($this);
        echo "say hello : ".$this->default_name.self::$name;
    }
    public static function sayhi()
    {
        echo "\nsay hi\n";

    }
}

class Test
{
    public static function sayhi()
    {
        SimpleClass::sayhi();
    }

    public static function getNewStatic()
    {
        //return new self;
        return new static;
    }
}

class Child extends Test{}


$name = "SimpleClass";
$a = new SimpleClass();
$a->hi();
Test::sayhi();
$b = new $name;
$b->hi();

$test = Test::getNewStatic();
$test2 = new Test();
echo "\n";
var_dump($test,$test2);
var_dump($test instanceof Test);

$child = Child::getNewStatic();
$child2 = new Child();
var_dump($child,$child2);
var_dump($child instanceof Child);



class A
{
    public $name = 1;
    protected $name2 = 2;
    private $name3 = 3;
}

class Ason extends A
{
    public function printfln()
    {
        echo $this->name;
        echo $this->name2;
        //echo $this->name3;
    }
}
$b = new Ason();
$b->printfln();
//echo $b->name3;





















