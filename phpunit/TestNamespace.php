<?php

namespace  test;
class TestNamespace extends \PHPUnit_Framework_TestCase
{

    public function testFunc()
    {
        $this->assertEquals("1",1);
    }


}