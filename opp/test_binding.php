<?php
/**
 *
 * 以下用法
 * self::，parent::，static:: 以及 forward_static_call()。可用 get_called_class() 函数来得到被调用的方法所在的类名
 * 会后期计算调用的类名。对于以上参数他们会一直寻找需要转发的类。
 *
 *
 * static 转发调用，
 * 非转发调用
 *
 *
 */
class A
{
    public static function getSelf()
    {
        echo __CLASS__;
        echo "a";
    }
    public static function test()
    {
        //self::getSelf();
        static::getSelf();
    }

}


class B extends A
{
    public static function getSelf()
    {
        echo __CLASS__;
        echo "b";
    }

}
B::test();




class C
{
    public  function getSelf()
    {
        echo __CLASS__;
    }
    public  function test()
    {
        //self::getSelf();
        static::getSelf();
    }

}


class D extends C
{
    public  function getSelf()
    {
        echo __CLASS__;
    }

}
$d = new D();
$d->test();







