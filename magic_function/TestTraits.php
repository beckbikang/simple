<?php
/**
 *
 *
 *
* Copyright(c) 201x,
* All rights reserved.
*
* 功 能：
* @author bikang@book.sina.com
* @date 2014-5-27
* 版 本：1.0
*
* 自PHP 5.4.0 起引入traits
*
* Traits 是一种为类似 PHP 的单继承语言而准备的代码复用机制。
*
* 优先顺序是来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。
*
*
*
 */


trait Hello{

    function sayHi()
    {
        echo "say hi trait\n";
    }

    function sayWorld() {
        echo 'hello World\n';
    }
}

trait World {
    public function sayWorld() {
        echo 'World\n';
    }
}

class TestTrait
{
    function sayHi()
    {
        echo "say hi TestTrait\n";
    }

}


class TestTraitSon extends TestTrait
{
    use Hello,World
    {
        //World::sayWorld insteadof Hello;
        Hello::sayWorld insteadof World;
    }
    /*
    function sayHi()
    {
        echo "say hi TestTraitSon\n";
    }
    */
}

$obj =new TestTraitSon();
$obj->sayHi();
$obj->sayWorld();

