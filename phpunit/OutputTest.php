<?php

class OutputTest extends PHPUnit_Framework_TestCase
{
    public function testPrint()
    {
        $this->expectOutputString("beck");
        print "beck";
    }

    public function testEcho()
    {
        $this->expectOutputString("tom");
        echo "beck";
    }

    public function testEquals()
    {
        $this->assertEquals(
                array(1,2,3),
                array(1,2,3,4)
                );
    }
    /**
     *equals 认为 1 和'1'是同一值
     */
    public function testEqualsMore()
    {
        $this->assertEquals(
                array(1,2,3),
                array(1,2,'3',)
        );
    }

    public function testEqualsLast()
    {
        $this->assertEquals(1,"1");
    }

}
