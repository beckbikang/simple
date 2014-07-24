<?php

$dsn = 'mysql:dbname=test;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$sql = "insert into test_between(sum)values(122)";
$res = $dbh->exec($sql);
var_dump($res);

$select_sql = "select * from test_between";
$res = $dbh->query($select_sql);
foreach($res as $row)
{
    print_r($row);
}








