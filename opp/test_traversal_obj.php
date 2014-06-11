<?php
/**
 * traversal object
 *
 *  提供了一种定义对象的方法使其可以通过单元列表来遍历
 *  1 遍历$this just like (foreach($this as $k=>$v))
 *  2 Iterator 接口
 *  3 IteratorAggregate 接口
 *
 *
 */

class TravelFirst
{
    public $p1 = "one";
    public $p2 = "two";
    public $p3 = "three";

    public function show()
    {
       foreach ($this as $k=>$v)
       {
           print $k."=>".$v."\n";
       }
    }

}

$tf = new TravelFirst();
$tf->show();

//实现Iterator接口
class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind() {
        echo "rewinding\n";
        reset($this->var);
    }

    public function current() {
        $var = current($this->var);
        echo "current: $var\n";
        return $var;
    }

    public function key() {
        $var = key($this->var);
        echo "key: $var\n";
        return $var;
    }

    public function next() {
        $var = next($this->var);
        echo "next: $var\n";
        return $var;
    }

    public function valid() {
        $var = $this->current() !== false;
        echo "valid: {$var}\n";
        return $var;
    }
}

$values = array(1,2,3);
$it = new MyIterator($values);

foreach ($it as $a => $b) {
    print "$a: $b\n";
}

class MyCollection implements IteratorAggregate
{
    private $items = array();
    private $count = 0;

    // Required definition of interface IteratorAggregate
    public function getIterator() {
        return new MyIterator($this->items);
    }

    public function add($value) {
        $this->items[$this->count++] = $value;
    }
}

$coll = new MyCollection();
$coll->add('value 1');
$coll->add('value 2');
$coll->add('value 3');

foreach ($coll as $key => $val) {
    echo "key/value: [$key -> $val]\n\n";
}

