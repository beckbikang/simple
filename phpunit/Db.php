<?php
class Db
{
    public static function getDb()
    {
        $con = mysql_connect("localhost:3306","root","") or die("can't connect");
        mysql_set_charset("utf8");
        mysql_select_db("test",$con);
        return $con;
    }

}


