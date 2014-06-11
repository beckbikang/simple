<?php
/**
 *
 *
* ==
*     如果两个对象的属性和属性值 都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等。
* ===
*    这两个对象变量一定要指向某个类的同一个实例（即同一个对象）
*
*
*
 */
class Equal
{


}


$e = new Equal();
$e1 = new Equal();
var_dump($e,$e1);
var_dump($e==$e1);
var_dump($e===$e1);


