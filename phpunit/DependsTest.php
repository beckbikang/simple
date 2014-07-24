<?php

/**
 *
* Copyright(c) 201x,
* All rights reserved.
*
* 功 能：
* @author bikang@book.sina.com
* @date 2014-6-12
* 版 本：1.0
 */
class DependsTest extends PHPUnit_Framework_TestCase
{

    /**
     *  test array push&pop
     */
    public function testArrayPushPop()
    {
        $res = array();
        array_push($res,"pear","apple");
        $this->assertTrue(count($res) == 2);
        $pop = array_pop($res);
        $this->assertTrue($pop == "apple");
    }

    /**
     * test empty
     */
    public function testEmpty()
    {
        $res = array();
        $this->assertEmpty($res);
        return $res;
    }

    /**
     * @depends testEmpty
     */
    public function testPop($res)
    {
        array_push($res,"pear");
        $this->assertTrue($res[count($res)-1] == "pear");
        $this->assertTrue(count($res) == 1);
        return $res;
    }

    /**
     * @depends testPop
     * @param unknown $res
     */
    public function testPush($res)
    {
        $this->assertTrue(array_pop($res) == "pear");
        $this->assertEmpty($res);
    }


    public function testOne()
    {
        //$this->assertTrue(FALSE);
        $this->assertTrue(True);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {

    }

    public function testFirst()
    {
        $this->assertTrue(True);
        return "f";
    }
    public function testSecond()
    {
        $this->assertTrue(True);
        return "s";
    }

    /**
     * @depends testFirst
     * @depends testSecond
     */
    public function testThird()
    {
        $this->assertTrue(True);
        $this->assertEquals(func_get_args(),array("f","s"));
    }



}
