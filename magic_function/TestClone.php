<?php
/**
 * 对象复制可以通过 clone 关键字来完成（如果可能，这将调用对象的 __clone() 方法）。对象中的 __clone() 方法不能被直接调用。
 *
 */
class TestClone
{
    private $name = "tom";

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }


    public function __clone()
    {
        $this->setName("beck");
    }

}

$a = new TestClone();
$b = clone $a;
$c = $a;
echo $a->getName();
echo $b->getName();
echo $c->getName();
var_dump($a,$b,$c);
