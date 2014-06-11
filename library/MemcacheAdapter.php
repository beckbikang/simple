<?php
/**
 *
 * 写一个简单的mc操作类
 *
 *
 *
 */
class MemcacheAdapter
{
    public static $handle = null;
    public static $_instance = array();

    /**
     * 连接memcache
     *
     * @param array $servers
     * @return boolean
     */
    public function __construct(array $servers)
    {
        if(!is_array($servers))
        {
            return false;
        }

        foreach($servers as $server)
        {
            if(count($server) != 3) return false;
        }
        $key = md5(json_encode($servers));
        if(!isset(self::$_instance[$key]))
        {
            $handle = new Memcached();
            $handle->addServers($servers);
            self::$_instance[$key] = $handle;
        }
        self::$handle = self::$_instance[$key];
        return self::$handle;
    }

    /**
     * 获取数据
     * @param unknown $key
     * @return Multi
     */
    public function read($key)
    {
        if(!self::$handle) return false;
        $key = urlencode($key);
        return self::$handle->get($key);
    }

    /**
     * 批量读取数据
     * @param array $keys
     * @return Multi
     */
    public function readMult(array $keys)
    {
        if(!self::$handle) return false;
        if(!is_array($keys)) return false;
        foreach($keys as $k=>$v)
        {
            $keys[$k] = urlencode($v);
        }
        return self::$handle->getMulti($keys);
    }

    /**
     * 写
     * @param string $key
     * @param array $params
     * @param number $time
     * @return boolean
     */
    public function write($key,$params,$time=86400)
    {
        if(!self::$handle) return false;
        $key = urlencode($key);
        return self::$handle->set($key, $params, $time);
    }

    /**
     * 批量写
     * @param array $items
     * @param number $time
     * @return boolean
     */
    public function writeMult($items,$time=86400)
    {
        if(!self::$handle) return false;
        if(!is_array($items)) return false;
        return self::$handle->setMulti($items, $time);
    }

    /**
     * 删除缓存
     * @param string $key
     */
    public function delete($key)
    {
        if(!self::$handle) return false;
        $key = urlencode($key);
        return self::$handle->delete($key);
    }
    /**
     * 清空所有缓存
     */
    public function clear()
    {
        if(!self::$handle) return false;
        return self::$handle->flush();
    }

    /**
     * 缓存自增
     * @param unknown $key
     * @param string $value
     * @return boolean
     */
    public function increment($key, $value = null)
    {
        if(!self::$handle) return false;
        $key = urlencode($key);
        return self::$handle->increment($key,$value);
    }

    /**
     * 自减
     * @param unknown $key
     * @param string $value
     */
    public function decrement($key, $value = null)
    {
        if(!self::$handle) return false;
        $key = urlencode($key);
        return self::$handle->decrement($key,$value);
    }

    public function __destruct()
    {
    }
}
