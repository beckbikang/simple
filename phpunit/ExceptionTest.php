<?php

class ExceptionTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Some
     *
     * @throws InvalidArgumentException
     */
    public function testException()
    {
        throw new InvalidArgumentException('Some Message', 10);
    }

    /**
     *  @expectedException InvalidArgumentException
     *  @expectedExceptionCode 10
     *
     * @throws InvalidArgumentException
     */
    public function testExceptionCode()
    {
        throw new InvalidArgumentException('Some Message', 10);
    }

    //设定异常处理器
    public function testSetException()
    {
        $this->setExpectedException("InvalidArgumentException");
        throw new InvalidArgumentException();
    }

    //设定异常处理器
    public function testSetExceptionMessage()
    {
        $this->setExpectedException("InvalidArgumentException","Some Message");
        //var_dump($this->getExpectedException());
        throw new InvalidArgumentException("Some Message");
    }

    //设定异常处理器
    public function testSetExceptionCode()
    {
        $this->setExpectedException("InvalidArgumentException",10);
        throw new InvalidArgumentException(10);
    }

    /**
     * 测试异常方法
     * @throws InvalidArgumentException
     */
    public function testExceptionFunc()
    {
        try{
            if(is_int(3))
                throw  new InvalidArgumentException("new exception");
        }catch(InvalidArgumentException $e){
            return ;
        }
        $this->fail("there is no Exception");
    }
}