<?php

class ErrorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     *
     */
    public function testError()
    {
        include "a.php";
    }
    public function  testNotice(){}
    public function testWarning(){}
    /**
     *
     */
    public function testControl()
    {
        $fp = @fopen("a.txt","r");
    }


}
