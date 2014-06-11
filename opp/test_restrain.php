<?php
/**
 * php5 的类型约束：
 *    对象，数组，接口
 *
 * 不能作为对象约束：
 *      int,string,Traits
 *
 *
 *
 */

class Hi
{
    public function sayHi()
    {
        echo "hi\n";
    }
}
class B
{
    public function sayHi()
    {
        echo "hi\n";
    }
}

class Restrain
{

    //public function test(int $a)
    public function test($a)
    {
        echo $a;
    }
    public function sayHi(Hi $obj)
    {
        $obj->sayHi();
    }
}


$res = new Restrain();
$res->test(33);
$obj = new Hi();
$res->sayHi($obj);











