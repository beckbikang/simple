<?php
/**
* 构造函数和析构函数
*
* 构造函数:
*    1 在子类未定义构造函数，自动调用父类的构造函数
*    2 子类定义了构造函数，不会隐式调用父类的构造函数
* 析构函数：
*    1 在子类没有定义析构函数，会自动调用父类的析构函数
*    2 在子类中定义了析构函数，不会隐式调用父类的析构函数
* 显示的调用父类的方法：
*    parent::__construct(),parent::__desctruct()调用析构函数
*
*
*
*
*
 */

class Father
{
    public function __construct()
    {
        echo "father construct\n";
    }

    public function __destruct()
    {
        echo "father desctruct\n";
    }

}

class Son extends Father
{
    public $name = "son";
    public function __construct()
    {
        parent::__construct();
        echo "son construct\n";
    }

    public function __destruct()
    {
        parent::__destruct();
        echo "son desctruct\n";
    }

    public static function hi()
    {
       // echo $this->name;
    }


}

$s = new Son();

Son::hi();







