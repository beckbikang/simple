<?php
/**
 * 自动加载的两种方式：
 *     1 __autoload($classname)
 *     2 spl_autoload_register
 *
 */
/*
function __autoload($classname){
    include $classname.'.php';
}
*/

function loader($classname)
{
    include $classname.".php";
}
spl_autoload_register("loader");

//var_dump(spl_classes());
$loader = new Loader();
$loader->testLoader();


