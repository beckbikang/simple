<?php
require_once "Between.php";
class BetweenTest extends PHPUnit_Framework_TestCase
{
    /*
     * insert
     */
    public function test_insert()
    {
        $this->assertTrue( Between::insert('123') );
        $find = Between::find(1231276);
        $this->assertTrue($find == false);
        //$this->assertTrue($find["sum"] == 123);
    }
    /**
     * delete
     */
    public function test_insert_after_delete()
    {
        $this->assertTrue( Between::delete_all() );
        $this->assertTrue(Between::insert( '1' ) );
        $this->assertTrue(Between::insert( '2' ) );
        $this->assertTrue(Between::insert( '3' ) );
        $find = Between::find_all();
        $this->assertTrue(count($find) == 3);
    }
    /**
     * update
     */
    public function test_update()
    {
        $this->assertTrue( Between::insert_item(1, 123) );
        $this->assertTrue(Between::update(1, 333));
        $find = Between::find(1);
        $this->assertTrue($find["sum"] == 333);
    }

}