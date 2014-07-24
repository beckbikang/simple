<?php
require_once dirname(__FILE__)."/CsvFileIterator.php";

class DataProviderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProvider
     * @param number $a
     * @param number $b
     * @param number $res
     */

    public function testAdd($a,$b,$res)
    {
        $this->assertEquals(($a+$b),$res);
    }


    /**
     * dataProvider
     * @return array
     */
    public function dataProvider()
    {
        return array(
                array(0,1,1),
                array(1,2,3),
                array(1,1,2),
                array(1,3,4),
                );
    }

    /**
     * @dataProvider dataProviderIteral
     *
     *
     * @param unknown $num1
     * @param unknown $num2
     * @param unknown $res
     */
    public function testAddIteral($num1,$num2,$res)
    {
        $this->assertEquals(($num1+$num2),$res);
    }

    public function dataProviderIteral()
    {
        return new CsvFileIterator("data.csv");
    }
}