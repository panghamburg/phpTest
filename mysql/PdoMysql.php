<?php
class PdoMysql
{
    private $linkId = null;
    private $PDOStatement = null;
    const CHARSET = 'utf8';
    const DB_HOST = '127.0.0.1';
    const DB_PORT = '3306';
    const DB_USER = 'root';
    const DB_PASSWD = 'root';
    const DB_NAME = 'lxdata';//数据库名
    const DE_BUG = true;
    const DB_LOG = true;
    private $querySql = '';
    private $params = [];
    private $autoCommit = true;
    protected $transactionCount = 0;
    private $DBPress = 'test_';
    protected $res = '';

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        if(!class_exists('PDO')) {
            throw new Exception('not found PDO');
        }
        try {
            $this->linkId = new PDO(
                'mysql:host='. self::DB_HOST.';dbname='. self::DB_NAME, self::DB_USER, self::DB_PASSWD
            );
            $this->linkId->query('set name ' . self::CHARSET);
        } catch (PDOException $e) {
            echo '数据库连接失败:'. $e->getMessage();die;
        }
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->free();
        $this->destroy();
    }

    public function __clone()
    {
        return $this->linkId = null;
    }

    public function __get($property_name)
    {
        if(isset($this->$property_name)) {
            return $this->$property_name;
        } else {
            return null;
        }
    }

    public function __set($property_name, $value)
    {
        // TODO: Implement __set() method.
        $this->$property_name = $value;
    }

    /**
     * 释放结果
     */
    public function free()
    {
        $this->PDOStatement = null;
        $this->params = [];
    }

    /**
     * 销毁变量
     */
    public function destroy()
    {
        $array = array('field'=>'','join'=>'','where'=>'','group'=>'','having'=>'','order'=>'','limit'=>'','pk'=>'');
        foreach($array as $key=>$value) {
            unset($this->$key);
        }
    }

    /**
     * 过滤字符
     */
    private function saddslashes($sql)
    {
        $sql = trim($sql);
        $sql = addslashes($sql);
        return $sql;
    }

    /**
     * 函数执行错误
     */
    public function __call($function_name, $arguments)
    {
        if(!function_exists($function_name)) {
            throw new Exception("你所调用的函数： ". $function_name ."不存在");
        }
    }

    public function getSql()
    {

    }

    public function query($sql, $return=false)
    {
        $result = $this->linkId->query($sql);
        if($result) {
            $this->res = $result;
        }
        return $result;
    }

    public function exec($sql)
    {
        $result = $this->linkId->exec($sql);
        if($result) {
            $this->res = $result;
        }
        return $result;
    }

    public function fetch()
    {
        return $this->res->fetch();
    }

    public function fetchAll()
    {
        return $this->res->fetchAll();
    }
}