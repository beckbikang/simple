<?php
/**
 * connet db buy mysqli
 * Copyright(c) 201x,
 * All rights reserved.
 *
 * 功 能：
 * @author cabing_2005@126.com
 * @date 2014-7-24
 * 版 本：1.0
 */
namespace DB;
require_once "Db.php";
class MyslqliAdapterException extends \Exception{}
class MyslqliAdapter implements database{
    private $_host;
    private $_user;
    private $_pass;
    private $_db;
    private $_charset;
    private $_port;
    private $_error;
    private $_handler = null;
    private $_instance = array();

    public function __construct($config) {
        $keys = $this->getKeys($config);
        $keys = $this->getEncryptKeys($keys);
        if(isset($this->_instance[$keys])){
            $this->_handler = $this->_instance[$keys];
        }else{
            $this->connect();
            $this->_instance[$keys] = $this->_handler;
        }
    }

    /**
     *  获取keys
     * @param unknown $config
     * @throws MyslqliAdapterException
     * @return string
     */
    public function getKeys($config){
        $keys = "";
        if(!isset($config["host"])){
            throw new MyslqliAdapterException("host is empty");
        }else{
            $this->_host = $config["host"];
            $keys .= $this->_host;
        }
        if(!isset($config["user"])){
            throw new MyslqliAdapterException("user is empty");
        }else{
            $this->_user = $config["user"];
            $keys .= $this->_user;
        }
        if(!isset($config["pass"])){
            throw new MyslqliAdapterException("pass is empty");
        }else{
            $this->_pass = $config["pass"];
            $keys .= $this->_pass;
        }
        if(!isset($config["db"])){
            throw new MyslqliAdapterException("db is empty");
        }else{
            $this->_db = $config["db"];
            $keys .= $this->_db;
        }
        if(!isset($config["port"])){
            throw new MyslqliAdapterException("port is empty");
        }else{
            $this->_port = $config["port"];
            $keys .= $this->_port;
        }
        if(!isset($config["charset"])){
            throw new MyslqliAdapterException("charsert is empty");
        }else{
            $this->_charset = $config["charset"];
            $keys .= $this->_charset;
        }
        return $keys;
    }

    /**
     *  加密keys
     * @param unknown $keys
     * @return string
     */
    public function getEncryptKeys($keys) {
       return md5($keys);
    }

    /**
     * 连接数据库
     * @see \DB\database::connect()
     */
    public function connect() {
        $this->_handler = new \mysqli($this->_host, $this->_user,$this->_pass, $this->_db,$this->_port);
        if($this->_handler->connect_error){
            throw new MyslqliAdapterException("connect Error");
        }
        if (!$this->_handler->set_charset($this->_charset)) {
            throw new MyslqliAdapterException("set charset error");
        }
    }

    /**
     * 获取一条数据
     * @param unknown $sql
     * @return multitype:
     */
    public function fetchOne($sql) {
        $data = array();
        if(!empty($this->_handler)){
            $this->_handler->select_db($this->_db);
            $res = $this->_handler->query($sql);
            if($res){
                $data = $res->fetch_array(MYSQLI_ASSOC);
            }else{
                throw new MyslqliAdapterException("query Error:".$this->_handler->error);
            }
        }
        return $data;
    }

    /**
     * 获取多条数据
     * @param unknown $sql
     * @return multitype:unknown
     */
    public function fetchRows($sql) {
        $data = array();
        if(!empty($this->_handler)) {
            $query = $this->_handler->query($sql);
            if($query){
                while($row = $query->fetch_array(MYSQLI_ASSOC)) {
                    $data[] = $row;
                }
            }else{
                throw new MyslqliAdapterException("query Error:".$this->_handler->error);
            }

        }
        return $data;
    }


    /**
     * 查询
     * @see \DB\database::query()
     */
    public function query($sql) {
        $result = "";
        if(!empty($this->_handler)){
            $result = $this->_handler->query($sql);
        }
        return $result;
    }



    /**
     * close mysql db handler
     *
     */
    public function __desctruct(){
        if(isset($this->_handler)){
            mysqli_close($this->_handler);
        }
    }
}
//"localhost", "root", "", "test","3306"
$config = array("host"=>"localhost","user"=>"root","pass"=>"",
            "db"=>"test","port"=>"3306","charset"=>"latin1",
            );
$mysqli = new MyslqliAdapter($config);
$sql = "SELECT * FROM test_between";
var_dump($mysqli->fetchOne($sql));
