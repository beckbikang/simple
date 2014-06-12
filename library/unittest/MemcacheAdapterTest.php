<?php
$basedir = dirname(dirname(__FILE__));

require_once $basedir."/MemcacheAdapter.php";
$config = include $basedir."/testconfig/config.php";


class MemcacheAdapterTest extends PHPUNIT_Framework_TestCase
{
    public function setUp()
    {
        //$this->
    }
    public function setDown()
    {
        $this->obj = NULL;
    }


}

