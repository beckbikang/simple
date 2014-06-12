<?php

require_once 'Db.php';
class Between
{
    const TABLE = "test_between";

    public static function insert_item($id,$sum)
    {
        $sum = intval($sum);
        $id = intval($id);
        if($sum < 0 || $id < 0) return false;

        $handle = Db::getDb();
        $sql = "insert into ".self::TABLE."(id,sum)values"."($id,$sum)";
        return mysql_query($sql,$handle);
    }

    public static function insert($sum)
    {
        $sum = intval($sum);
        if($sum < 0 ) return false;

        $handle = Db::getDb();
        $sql = "insert into ".self::TABLE."(sum)values"."($sum)";
        return mysql_query($sql,$handle);
    }

    public static function delete_all()
    {
        $handle = Db::getDb();
        $sql = "delete from ".self::TABLE;
        return mysql_query($sql,$handle);
    }

    public static function delete($id)
    {
        $id = intval($id);
        if($id < 0 ) return false;

        $handle = Db::getDb();
        $sql = "delete from ".self::TABLE." where id=".$id;
        return mysql_query($sql,$handle);
    }

    public static function update($id,$value)
    {
        $id = intval($id);
        $value = intval($value);
        if($id < 0 || $value < 0) return false;

        $handle = Db::getDb();
        $sql = "update ".self::TABLE." set sum=".intval($value)." where id =".$id;
        return mysql_query($sql,$handle);
    }

    public static function find_all()
    {
        $handle = Db::getDb();
        $sql = "select * from ".self::TABLE;
        $query = mysql_query($sql,$handle);
        $result = array();
        if(!$query)
            return false;
        while($re = mysql_fetch_array($query,MYSQL_ASSOC))
        {
            $result[] = $re;
        }
        return $result;
    }

    public static function find($id)
    {
        $id = intval($id);
        if($id < 0) return false;

        $handle = Db::getDb();
        $sql = "select * from ".self::TABLE." where id =".$id;
        $query = mysql_query($sql,$handle);

        if(!$query)
            return false;

        return mysql_fetch_array($query,MYSQL_ASSOC);
    }

}
