<?php
function add($a, $b)
{
    return $a+$b;
}


$con = mysql_connect("localhost:3306","root","") or die("can't connect");
