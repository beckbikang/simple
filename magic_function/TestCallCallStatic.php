<?php
/**
 *
* Copyright(c) 201x,
* All rights reserved.
*
* 功 能：
* @author bikang@book.sina.com
* @date 2014-5-26
* 版 本：1.0
*
* 静态方法：
*    当调用一个不可访问的方法的时候调用__call
*    当调用一个不可访问的静态方法的时候调用__callStatic
*
*
 */

class ArgumentsObj
{
    public function __toString()
    {
        echo "it's ArgumentsObj to String";
        return "";
    }
}

class TestCallCallStatic
{
    public function __call($name, $arguments)
    {
        echo "use __call: \n";
        echo "function name is: ".$name."\n";
        echo " arguments is:";
        //array
        if(is_array($arguments))
            echo implode(",",$arguments);
        //obj
        if(is_object($arguments))
            echo $arguments;


    }

    public static function __callstatic($name, $arguments)
    {
        echo "use __callStatic: \n";
        echo "function name is: ".$name."\n";
        echo " arguments is:";
        //array
        if(is_array($arguments))
            echo implode(",",$arguments);
        //obj
        if(is_object($arguments))
            echo $arguments;

    }
}

$obj_call = new TestCallCallStatic();
$obj_call->say("boy");
TestCallCallStatic::say("haha");

$arg_obj = new ArgumentsObj();
$obj_call->say($arg_obj);
TestCallCallStatic::say($arg_obj);



