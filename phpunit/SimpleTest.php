<?php

require_once dirname(__FILE__)."/Add.php";

class SimpleTest extends PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $this->assertEquals(3,add(1,2));
    }

}



