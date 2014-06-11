<?php
/**
 *
 *  __construct 构造函数，创建对象前的一些初始化工作
 *  __destruct 析构函数，创建对象后的一些释放工作
 *
 *  注意：
 *      在php中，子类中不定义构造函数会隐式调用父类的构造函数
 *      在php中，子类定义了构造函数就不会隐式的调用父类的构造函数
 *
 *
 */
class TestConstruct
{
    //construct
    public function __construct()
    {
        echo "construct working in ".__CLASS__."\n ";
    }

    public function __destruct()
    {
        echo "destruct working in".__CLASS__."\n";
    }
}

class SonConstruct extends TestConstruct
{
    public function __construct()
    {
        parent::__construct();
        echo "construct working in ".__CLASS__."\n ";
    }

}


$test_cons = new TestConstruct();
$test_son = new SonConstruct();

function test()
{
    echo "\n log \n";
}
register_shutdown_function("test");



