<?php
/**
 * 异常处理的基本语法：
 *     try catch throw
 *
 *
 *
 */

try{
    $a = 1;
    $b = 0;
    if($b == 0){
        throw new Exception("can't divide by zero");
    }
    $c = $a/$b;
}catch(Exception $e)
{
    echo $e->getMessage();
}







