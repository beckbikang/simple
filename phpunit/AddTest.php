<?php
require_once dirname(__FILE__)."/Add.php";

class AddTest extends PHPUnit_Framework_TestCase
{
    public function test1()
    {
        //$this->assertEquals(3,add(1, 2));
        $this->assertTrue(3 == add(1, 2));
    }

    public function test2()
    {
        //$this->assertEquals(3,add(1, 1));
        $this->assertTrue(3 != add(1, 1));
    }



}








