<?php
/**
 * 测试 __sleep 和__wakeup
 *
 * serialize序列号前调用__sleep
 *
 * unserialize反序列化时调用__wakeup
 *
 * 句柄是没法序列号存储的。
 *
 * 序列化实现对象的二进制存储和传输
 *
 *
 *
 */
class TestSleepWakeup
{
    protected $link;
    private $server, $username, $password, $db;

    public function __construct($server, $username, $password, $db)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $this->connect();
    }

    private function connect()
    {
        $this->link = mysql_connect($this->server, $this->username, $this->password);
        mysql_select_db($this->db, $this->link);
    }

    public function __sleep()
    {
        return array('server', 'username', 'password', 'db');
    }

    public function __wakeup()
    {
        $this->connect();
    }
}

$server = "localhost";
$username = "root";
$password = "";
$db = "test";
$con = new TestSleepWakeup($server, $username, $password, $db);
var_dump($con);
$serial_con = serialize($con);
$con_after = unserialize($serial_con);
var_dump($con);




