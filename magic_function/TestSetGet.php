<?php
/**
 * php可以动态的创建属性和方法，这是通过魔术方法来实现的
 *    1 所有的重载方法都必须声明为public
 *    2 常用方法
 *        __set(),__get(),调用不可访问的属性时
 *    __isset(),__unset() 对不可访问的属性分别调用isset(),unset()时
 *    3 属性重载只能在对象中进行。在静态方法中，这些魔术方法将不会被调用。
 *
 */

class TestSetGet
{
    private $data = array();

    public $show = 1;

    private $hidden = 2;

    //__set
    public  function __set($name,$value){
        $this->name = $value;
    }

    //__get
    public function __get($name)
    {
        if(isset($this->data[$name])){
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    //__isset
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }


    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function getHidden()
    {
        return $this->hidden;
    }

    public function  getData()
    {
        return $this->data;
    }

    //这些动态属性加载方法只能在对象中使用
    public static function setStatic()
    {
        return false;
    }



}

$obj = new TestSetGet();
$obj->name = "beck";
var_dump(isset($obj->name));
unset($obj->name);
var_dump(isset($obj->name));

echo $obj->show;
$obj->show = 1231;
var_dump($obj->show);
$obj->name123123 = "tom";
var_dump(isset($obj->name123123));
var_dump($obj->getData());

var_dump($obj->getHidden());
$obj->hidden = 1231;
var_dump($obj->hidden);
















