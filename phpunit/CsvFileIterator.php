<?php
/*
*     1 rewind,valid,current,key
*     2 next,valid,current,key
*     3 next,valid,current,key
*/

class CsvFileIterator implements Iterator
{
    protected $fp;
    protected $key = 0;
    protected $current;
    protected $count;

    /**
     *
     * @param unknown $file
     */
    public function __construct($file)
    {
        $file = dirname(__FILE__)."/".$file;
        $this->fp = fopen($file, "r");
        if(!$this->fp)
            throw new Exception("can't open th file");
        $this->count = count(file($file));
    }

    /**
     * 析构函数
     */
    public function __destruct()
    {
        if($this->fp)
            fclose($this->fp);
    }

    public function current ()
    {
        return $this->current;
    }
    public function key()
    {
        return $this->key;
    }
    public function next()
    {
        $this->key++;
        $this->current = fgetcsv($this->fp);
    }
    public function rewind()
    {
        rewind($this->fp);
        $this->current = fgetcsv($this->fp);
        $this->key = 0;
    }

    public function valid ()
    {
        return $this->key < $this->count;
    }

}




